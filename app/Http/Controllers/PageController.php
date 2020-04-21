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
        $breadcrumbs = $page->getBreadcrumbs();
        return view('pages.'.$page->type,compact('meta','title','page','values','breadcrumbs','bgImage'));
    }
    public function showFront()
    {
        $page = Page::findOrFail(1);
        $meta       = $page->getMeta();
        $values = $page->values;
        $title = $page->title;
        return view('pages.front', compact('meta',  'page','values','title'));

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
        ];

        $categories = Category::active()->get();
        foreach ($categories as  $category) {
            $url = $category->getUrl();
            $paths[$url] = $url;
        }
        $products = Product::active()->get();
        foreach ($products as $product) {
            $url = $product->getUrl();
            $paths[$url] = $url;
        }
        $pages = Page::active()->get();
        foreach ($pages as $item) {
            $url = $item->getUrl();
            $paths[$url] = $url;
        }
        $pages = \App\Models\News::active()->get();
        foreach ($pages as $item) {
            $url = $item->getUrl();
            $paths[$url] = $url;
        }
        $pages = \App\Models\Promo::active()->get();
        foreach ($pages as $item) {
            $url = $item->getUrl();
            $paths[$url] = $url;
        }
        $pages = \App\Models\Installation::active()->get();
        foreach ($pages as $item) {
            $url = $item->getUrl();
            $paths[$url] = $url;
        }
        array_sort($paths);
        foreach ($paths as $url) {
            Sitemap::addTag($url, false, 'daily', '1');
        }

        return Sitemap::render();
    }
}
