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

         
        return view('pages.'.$page->type, compact('meta', 'topMenuTitleList'));

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
}
