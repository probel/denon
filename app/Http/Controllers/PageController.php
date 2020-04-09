<?php

namespace App\Http\Controllers;

use App\Models\{
    Page,
    Meta
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

        $page = Page::where('slug',$slug)->first();
        if (!$page) abort(404);

        return view('pages.'.$page->type);

    }
    public function showFront()
    {

        $page = Page::find(1);
        if (!$page) abort(404);

        $topMenuTitleList = Page::getTitleList(); 
        
        $meta = $page->getMeta();
        $product = \App\Models\Product::first();
        $category = \App\Models\Category::where('parent_id','<',1)->first();


        $categories = \App\Models\Category::get();
        $news = \App\Models\News::get();

        $values =  array ( 'sliders' =>  array (0 => array('title'=>'12',
                                                                 'subtitle'=>'13',
                                                                 'description'=>'14',
                                                                 'title'=>'15',
                                                                 'url' => '16',
                                                                              'help' => '17')),
                                        'slogan' => 'ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...',
                                        'description' => 'УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ ...');
        return view('pages.'.$page->type, compact('meta', 'topMenuTitleList', 'categories', 'news', 'values'));

    }

    public function contacts()
    {
        $meta = "sfsdfsdf";
        $page = "23453452";
        $breadcrumbs ="sfdgdsfgsdfgsd";
        $bg_image = "bg_image";

        $values = array(
            'slogan' => "ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...",
            'description' => "УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .",
            'contacts_icon' => "Путь к иконке",
            'contacts_title' => "Путь к иконке",
            'contacts_subtitle' => "Путь к иконке",
            'contacts_text' => "Путь к иконке",
            'show_title' => "Путь к иконке",
            'show_text' => "Шоу рум denon",
            'legal_text'=> "HTML Информация о магазине ... Буйневич");
        return view('pages.contacts', compact('meta', 'page', 'breadcrumbs', 'bg_image', 'values'));
    }

    public function  warranty()
    {
        $meta = "sfsdfsdf";
        $page = "23453452";
        $breadcrumbs ="sfdgdsfgsdfgsd";
        $bg_image = "bg_image";

        $values = array(
            'slogan' => "ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...",
            'description' => "УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .",
            'warranty_icon' => "Путь к иконке",
            'warranty_title' => "Путь к иконке",
            'warranty_subtitle' => "Путь к иконке",
            'warranty_text' => "Путь к иконке",
            'service_title' => "Путь к иконке",
            'service_subtitle' => "Путь к иконке",
            'service_addresses' =>array (0 => array ("text" => "Москва", "title" => "ООО Северный")),
            'title' => array("Шоу рум denon"),
            'text'=> array("HTML Информация о магазине ... Буйневич"));
        return view('pages.warranty', compact('meta', 'page', 'breadcrumbs', 'bg_image', 'values'));
    }
    
    public function delivery()
    {
        $meta = "sfsdfsdf";
        $page = "23453452";
        $breadcrumbs ="sfdgdsfgsdfgsd";
        $bg_image = "bg_image";
             $values = array (
            'slogan'          => "ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ...",
            'description'     => "УНИКАЛЬНЫЕ ТЕХНОЛОГИИ DENON ДЛЯ .",
            'pay_icon'        => "Путь к иконке",
            'pay_title'       => "Путь к иконке",
            'pay_text'        => "Путь к иконке",
            'delivery_title'  => "Путь к иконке",
            'delivery_text'   => "Путь к иконке");
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


            /* $categories = \App\Models\Category::all();
            foreach ($categories as $category) {
                 $url = route('catalog.category', ['slug'=>$category->slug ]);
                $paths[$url] = $url;
            } */
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

            /*
            if ($city && $city->sitemap_add) {
                $add =explode("\n", $city->sitemap_add);
                foreach($add as $link) {
                    $url = url($link);
                    if (!in_array($url, $remove)) {
                        Sitemap::addTag($url, false, 'daily', '1');
                    }
                }
            } */



        /* $page = Page::where('lang', 'en')->orderBy('updated_at', 'DESC')->first();
        Sitemap::addTag(config('app.url') . '/en/', $page ? $page->updated_at : '', 'monthly', '1');
        Sitemap::addTag(config('app.url') . '/en/services/', $page ? $page->updated_at : '', 'monthly', '1');
        Sitemap::addTag(config('app.url') . '/en/cooperation/', '', 'monthly', '1');
        $pages = Page::where('lang', 'en')->where('type', 'story')->orderBy('updated_at', 'DESC')->get();
        foreach ($pages as $page) {
            Sitemap::addTag(config('app.url') . '/en/' . $page->alias . '.html', $page->updated_at, 'daily', '1');
        } */

        return Sitemap::render();
    }
    public function test()
    {
        $cart = \Cart::get();
        return('$cart');
    }
}
