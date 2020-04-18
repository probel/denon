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
            [ 'href'=> $category->parent->getUrl(), 'name'=>   $category->parent->title ],
            [ 'href'=> '', 'name'=>   $category->title ],
        ];
        $title = $category->title;
        $values = $category->values;
        $bgImage = $values['bg_image'] ?? 'images/project/page-title.jpg';
        $paginate = \Helpers::config('paginate') ?? 6;
        $products = $category->products()->active()->orderBy('order')->paginate($paginate);
        //dd($products->count());
        return view('pages.catalog.subCategory',compact('meta', 'title', 'values', 'bgImage', 'products', 'category', 'breadcrumbs'));
    }
    public function set($set)
    {
        if (!$set) {
            abort(404);
        }

        $products = \App\Models\Product::where('status',1)->orderBy('order');
        $pids = \App\Models\SetProduct::where('set_id',$set->id)
            ->get()
            ->pluck('product_id')
            ->unique()
            ->toArray();

        /* META */
        $metaEntity = Meta::find(16);
        $minPrice = \App\Models\ProductPrice::whereIn('product_id',$pids)->where('qty',1)->min('price');

        $metaTitle =  $set->meta_title ?? $metaEntity->title;
        $metaTitle = \str_replace(['%title%','%title_small%','%min_price%',],[strip_tags($set->name),mb_strtolower(strip_tags($set->name)),$minPrice],$metaTitle);

        $metaDescription =  $set->meta_description ?? $metaEntity->description;
        $metaDescription = \str_replace(['%title%','%title_small%','%min_price%',],[strip_tags($set->name),mb_strtolower(strip_tags($set->name)),$minPrice],$metaDescription);

        $metaKeywords =  $set->meta_keywords ?? $metaEntity->keywords;
        $metaKeywords = \str_replace(['%title%','%title_small%','%min_price%',],[strip_tags($set->name),mb_strtolower(strip_tags($set->name)),$minPrice],$metaKeywords);
        $meta = [
            'title' =>  $metaTitle,
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
        ];
        $breadcrumbs = [
            ['href'=>'/','name'=>'Главная'],
            ['href'=>route('catalog.show'),'name'=>'Каталог'],
            ['href'=> '','name'=>$set->name],
        ];
        $pageTitle = $set->name;
        $pids = \App\Models\SetProduct::where('set_id',$set->id)
            ->get()
            ->unique('product_id')
            ->pluck('product_id')
            ->toArray();
        $products = Product::where('accessory',0)->whereIn('id',$pids)->orderBy('order');
        $accessories = Product::where('accessory',1)->whereIn('id',$pids)->orderBy('order');
        $showAllLink = false;
        $showAllAccessoryLink = false;
        $products = $products->get();
        $accessories = $accessories->get();
        $category = (object) ['id' => 0, 'sets' => null];
        return view('pages.catalog.index',compact(
                             'meta',
                             'pageTitle',
                             'category',
                             'products',
                             'accessories',
                             'breadcrumbs',
                             'showAllLink',
                             'showAllAccessoryLink'));

    }
    public function brand($brand)
    {

        if ($brand) {
            $products = $brand->products->where('status',1)
                            ->sortBy('order');
            $pids = $products->pluck('id')->toArray();

            /* META */
            $metaEntity = Meta::find(6);
            $minPrice = \App\Models\ProductPrice::whereIn('product_id',$pids)->where('qty',1)->min('price');

            $metaTitle =  $brand->meta_title ?? $metaEntity->title;
            $metaTitle = \str_replace(['%title%','%min_price%',],[strip_tags($brand->name),$minPrice],$metaTitle);

            $metaDescription =  $brand->meta_description ?? $metaEntity->description;
            $metaDescription = \str_replace(['%title%','%min_price%',],[strip_tags($brand->name),$minPrice],$metaDescription);

            $metaKeywords =  $brand->meta_title ?? $metaEntity->keywords;
            $metaKeywords = \str_replace(['%title%','%min_price%',],[strip_tags($brand->name),$minPrice],$metaKeywords);
            $meta = [
                'title' =>  $metaTitle,
                'description' => $metaDescription,
                'keywords' => $metaKeywords,
            ];
            $breadcrumbs = [
                ['href'=>'/','name'=>'Главная'],
                ['href'=>route('catalog.show'),'name'=>'Каталог'],
                ['href'=> '','name'=>$brand->name],
            ];
            $pageTitle = $brand->name;

            $products = Product::whereIn('id',$pids)->orderBy('order');


            $products = $products->paginate($brand->paginate ?? cv('paginate'));
            $productsCount = $products->count();

            return view('pages.catalog.index',compact('meta','pageTitle','brand','products','breadcrumbs'));
        } else {
            abort(404);
        }
    }
    public function productFind($catalogSlug,$slug)
    {
        $product = Product::where('slug',$slug)->where('status',1)->first();
        return $this->product($product);
    }
    public function product($product)
    {
        if (!$product) { abort(404); }

            /* META */
            $meta = [
                'title' => str_replace('%product%',$product->name,$product->meta_title),
                'description' => str_replace('%product%',$product->name,$product->meta_description),
                'keywords' => str_replace('%product%',$product->name,$product->meta_tags),
            ];
            //$metaEntity = Meta::find(7);
            $metaTitle =  $product->meta_title;

            $meta =[];
            $breadcrumbs = [
                ['href'=>'/','name'=>'Главная'],
                ['href'=>route('catalog.show'),'name'=>'Каталог'],

            ];

                $category = $product->category;
                $breadcrumbs[] = ['href'=> route('catalog.category',['slug'=>$category->slug]),'name'=>$category->name];


            $breadcrumbs[] = ['href'=> '','name'=> \strip_tags($product->name)];
            $view = 'productcard';
            $title = $product->name;
            return view('pages.catalog.product',compact('meta','product','view','breadcrumbs','title'));
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
