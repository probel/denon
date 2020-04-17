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
    public function show($slug)
    {
        echo "test1234123"; 
        //$page = Page::where('slug',$slug)->first();
        if (!$page) abort(404);

        
        return view('pages.'.$page->type);

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

    public function contacts()
    {
        $meta = "sfsdfsdf";
        $page = Page::find(1);
        $breadcrumbs ="sfdgdsfgsdfgsd";
        $bg_image = "bg_image";

        $values = array(
            'slogan' => "ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...",
            'description' => "УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .",
            'contacts_icon' => "Путь к иконке",
            'contacts_title' => "Путь к иконке",
            'contacts_subtitle' => "Путь к иконке",
            'contacts_text' => "Путь к иконке",
            'show_subtitle' => "subtitle",
            'show_title' => "Путь к иконке",
            'show_text' => "Шоу рум denon",
            'legal_text'=> "HTML Информация о магазине ... Буйневич");
        return view('pages.contact', compact('meta', 'page', 'breadcrumbs', 'bg_image', 'values'));
    }

    public function  warranty()
    {
        $meta = "sfsdfsdf";
        $page = Page::where('slug','warranty')->get();
        $values = ($page->toArray())[0]['values'];
        return view('pages.warranty', compact('meta', 'page', 'values'));
    }
    
    public function delivery()
    {
        $meta = "sfsdfsdf";
        $page = Page::where('slug','delivery')->get();
        $breadcrumbs ="sfdgdsfgsdfgsd";
        $bg_image = "bg_image";
        $values = ($page->toArray())[0]['values']; 
        /*
            $values = array (
            'slogan'          => "ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...",
            'description'     => "УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .",
            'pay_subtitle'    => "sdfsdf",
            'pay_icon'        => "Путь к иконке",
            'pay_title'       => "Путь к иконке",
            'pay_text'        => "Путь к иконке",
            'delivery_title'  => "Путь к иконке",
            'delivery_text'   => "Путь к иконке");
        */     
        return view('pages.delivery', compact('meta', 'page', 'breadcrumbs', 'bg_image' , 'values'));
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
