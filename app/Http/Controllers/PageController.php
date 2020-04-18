<?php

namespace App\Http\Controllers;

use App\Models\{
    Page,
    Meta,
    Category
};
use Illuminate\Http\Request;
use Sitemap;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
        $meta = $page->getMeta();
        $title = $page->title;
        $values = $page->values;

        $bgImage = $values['bg_image'] ?? null;
        $breadcrumbs = [
            [ 'href'=>'/', 'name'=>   'Denon' ],
            [ 'href'=> '', 'name'=>   $page->title ],
        ];
        return view('pages.'.$page->type,compact('meta','title','page','values','breadcrumbs','bgImage'));
    }
    public function showFront()
    {
        $page = Page::find(1);
        if (!$page) abort(404);
        $valueSliderItems = ($page->toArray())['values'];

        $topMenuTitleList = Page::getTitleList();
        $meta       = $page->getMeta();
        $product    = \App\Models\Product::first();
        $category   = \App\Models\Category::where('parent_id','<',1)->first();
        $categories = \App\Models\Category::get();
        $news       = \App\Models\News::get();
        $catalog    = \App\Models\Product::get();

        //новинки в продуктах
        $productNews  = \App\Models\Product::where('status',1)->where('new',1)->get();

        return view('pages.'.$page->type, compact('meta', 'topMenuTitleList', 'catalog', 'categories', 'news', 'productNews','valueSliderItems'));

    }
    public function  warranty()
    {
        $page = Page::findOrFail(2);
        return $this->show($page);
    }
    public function delivery()
    {
        $page = Page::findOrFail(3);
        return $this->show($page);
    }
    public function contacts()
    {
        $page = Page::findOrFail(4);
        return $this->show($page);
    }





    public function sitemap()
    {
            $paths = [
                route('front'),
                //route('catalog.show')
            ];
            $remove = [];
            if($city && $city->sitemap_remove) {
                $links = explode("\n", $city->sitemap_remove);
                foreach($links as $link) {
                    $remove[] = url($link);
                }
            }


            $products = \App\Models\Product::where('status',1)->get();
            foreach ($products as $product) {
                $url = $product->getUrl();
                $paths[$url] = $url;
            }
            $pages = Page::where('status',1)->get();
            foreach ($pages as $item) {
                $url = route('page.show', ['slug' => $item->slug]).'/';
                if (!in_array($url, $remove)) {
                    Sitemap::addTag($url, $item->updated_at, 'daily', '1');
                }
            }
            array_sort($paths);
            foreach ($paths as $url) {
                if (!in_array($url, $remove)) {
                    Sitemap::addTag($url, false, 'daily', '1');
                }
            }

         return Sitemap::render();
    }
    public function test()
    {
        $cart = \Cart::get();
        return('$cart');
    }
}
