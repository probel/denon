<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Category, Brand, Set, SetProduct, SetCategory, Product, Page, Meta};

class CatalogController extends Controller
{
    public static function index() {

        $products = Product::with(['category'])->where('status',1);

        $order = request()->order ?? '';
        $sort = request()->sort ?? 'asc';
        $all = request()->all;
        $cat = request()->cat;
        $take = getConfigValue('catalog_take');
        if ($cat) {
            $products = $products->where('category_id',$cat);
        }

        $products = $products->orderBy('order');


        $res = [
            'status' => 'success',
            'fields' => ['.js-catalog-list' => view('shared.product.teasers',['products'=> $products,'more'=>$more])->render()]
        ];
        return $res;
    }
    public function categoryFront($id = null)
    {

        if ($id) {
            $category = Category::active()->findOrFail($id);
            $products = $category->products()->active()->orderBy('order')->take(8)->get();
            $url = $category->getUrl();
        } else {
            $products = Product::active()
                            ->where(function ($query) {
                                $query->where('old_price','>',0)
                                    ->orWhere('gift',1);
                            })
                            ->orderBy('order')
                            ->take(8)
                            ->get();
            $url = route('promo.index');
        }
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'html' => view('blocks.catalog', compact('products','url'))->render(),
            ]);
        }
        abort(404);
    }
    public function resolver($slugLine = null)
    {
        $slugs = explode('/',$slugLine);
        if (count($slugs) == 1) {
            $slug = array_pop($slugs);
            $category = Category::active()->where('slug',$slug)->first();
            if ($category) {
                return $this->category($category);
            }
            $page = Page::active()->where('slug',$slug)->whereType('typical')->first();
            if ($page) {
                $controller = new PageController();
                return $controller->show($page);
            }
        } else {
            $slug = array_pop($slugs);
            $parentSlug = array_pop($slugs);

            $products = Product::with('category.parent')->active()->where('slug',$slug)->get();

            foreach ($products as $product) {
                if ($product->category->slug == $parentSlug) {
                    return $this->product($product);
                }
            }

            $categories = Category::with('parent')
                                ->active()
                                ->where('parent_id','>',0)
                                ->where('slug',$slug)
                                ->get();
            foreach ($categories as $key => $category) {
                if($category->parent->slug == $parentSlug) {
                    return $this->subCategory($category);
                }
            }
        }
        abort(404);
    }

    public function show()
    {
        $current = null;
        $showAllLink = false;
        $showAllAccessoriesLink = false;

        $breadcrumbs = [
            ['href'=>'/','name'=>'Главная'],
            ['href'=> "#",'name'=>'Каталог']
        ];

        $meta = [];

        $arSelectedCategory = array ('usiliteli','sacdcd-proigryvateli','setevye-proigryvateli','vinilovye-proigryvateli');
        $selectedCategory = Category::where('status', 1)->whereIn('slug', $arSelectedCategory)->get();

        $products     = \App\Models\Product::where('status',1);
        //новинки в продуктах
        $productNews  = \App\Models\Product::where('status',1)->where('new',1)->get();

        return view('pages.catalog-d',compact('meta','current','products', 'productNews', 'breadcrumbs', 'selectedCategory'));
    }

    public function category($category)
    {
        if ($category->products->count()) {
            return $this->subCategory($category);
        }
        /* META */
        $meta = $category->getMeta();
        $breadcrumbs = [
            [ 'href'=>'/', 'name'=>   'Denon' ],
            [ 'href'=> '', 'name'=>   $category->title ],
        ];
        $title = $category->title;
        return view('pages.catalog.category',compact('meta', 'title', 'category', 'breadcrumbs'));
    }
    public function subCategory($category)
    {
        /* META */
        $meta = $category->getMeta();
        $breadcrumbs = [
            [ 'href'=>'/', 'name'=>   'Denon' ],
        ];
        if ($category->parent) {
            $breadcrumbs[] = [ 'href'=> $category->parent->getUrl(), 'name'=>   $category->parent->title ];
        }
        $breadcrumbs[] = [ 'href'=> '', 'name'=>   $category->title ];
        $title = $category->title;
        $values = $category->values;
        $bgImage = $values['bg_image'] ?? 'images/project/page-title.jpg';
        $paginate = \Helpers::config('paginate') ?? 6;
        list($filter,$sort) = \Catalog::getFilter();
        $products = $category->products()->active()->orderBy('available','desc')->orderBy($sort->order,$sort->direction);
        if ($filter->available != 'any') {
            $products = $products->where('available',$filter->available);
        }
        if ($filter->promo) {
            if ($filter->promo == 'any') {
                $products = $products->where(function ($query) {
                    $query->where('old_price','>',0)
                          ->orWhere('gift',1);
                });
            } elseif ($filter->promo == 'sale') {
                $products = $products->where('old_price','>',0);
            } elseif ($filter->promo == 'gift') {
                $products = $products->where('gift',1);
            }
        }

        $products = $products->paginate($paginate);
        return view('pages.catalog.subCategory',compact('meta', 'title', 'filter', 'sort', 'values', 'bgImage', 'products', 'category', 'breadcrumbs'));
    }
    public function promoIndex()
    {
        $page = Page::find(8);
        /* META */
        $meta = $page->getMeta();
        $breadcrumbs = [
            [ 'href'=>'/', 'name'=>   'Denon' ],
            [ 'href'=> '', 'name'=>   $page->title ],
        ];
        $title = $page->title;
        $values = $page->values;
        $bgImage = $values['bg_image'] ?? 'images/project/page-title.jpg';
        $paginate = \Helpers::config('paginate') ?? 6;
        list($filter,$sort) = \Catalog::getFilter();
        if (!$filter->promo) {
            $filter->promo = 'sale';
        }

        $products = Product::active()
                        ->orderBy('available','desc')
                        ->orderBy($sort->order,$sort->direction);
        if ($filter->promo == 'any') {
            $products = $products->where(function ($query) {
                $query->where('old_price','>',0)
                      ->orWhere('gift',1);
            });
        } elseif ($filter->promo == 'sale') {
            $products = $products->where('old_price','>',0);
        } elseif ($filter->promo == 'gift') {
            $products = $products->where('gift',1);
        }
        $category = (object) [
            'id' => null,
        ];
        $products = $products->paginate($paginate);
        return view('pages.catalog.subCategory',compact('meta', 'title', 'filter', 'sort', 'values', 'bgImage', 'products', 'category', 'breadcrumbs'));
    }
    public function product($product)
    {
        $meta = $product->getMeta();

        $breadcrumbs = [
            ['href'=>'/','name'=>'Denon'],
        ];
        if ($product->category) {
            if ($product->category->parent) {
                $breadcrumbs[] = ['href'=> $product->category->parent->getUrl(),'name'=>$product->category->parent->title];
            }
            $breadcrumbs[] = ['href'=> $product->category->getUrl(),'name'=>$product->category->title];
        }
        $title = $product->name;
        return view('pages.catalog.product',compact('meta','product','breadcrumbs','title'));
    }

    public function showPage($page)
    {

        if ($page) {
            /* META */
            $meta = [
                'title' => $page->meta_title,
                'description' => $page->meta_description,
                'keywords' => $page->meta_tags,
            ];


            /* END META */
            $breadcrumbs = [
                ['href'=>'/','name'=>'Главная'],
                ['href'=>ppId($page->id),'name'=>$page->title]
            ];
            return view('pages.'.$page->view,[
                'page'=>$page,
                'title'=> $page->title,
                'breadcrumbs'=> $breadcrumbs,
                'meta' => $meta,
                'view' => str_replace('.','-',$page->view),
                ]);
        } else {
            abort(404);
        }
    }
    public function market()
    {
        $products = Product::orderBy('order')->get();
        $categories = Category::orderBy('order')->get();
        $content = \View::make('xml.market',['products'=>$products,'categories'=>$categories]);

        return \Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}
