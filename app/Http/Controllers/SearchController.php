<?php

namespace App\Http\Controllers;

use App\Models\{
    Page, Product
};
use Illuminate\Http\Request;
use Sitemap;
use Illuminate\Support\Facades\Mail;

class SearchController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function search()
    {

        $find = request()->find;
        $page = Page::findOrFail(10);
        $breadcrumbs = $page->getBreadcrumbs();
        $meta = $page->getMeta();
        $values = $page->values;

        $bgImage = $values['bg_image'] ?? null;
        $title = $page->title;
        $paginate = $values['paginate'] ?? 9;

        $text = '';
        if ($find) {
            $results = Product::active()
                    ->where(function($query) use($find) {
                        $query->where('name', 'like', '%'.$find.'%')
                            ->orWhere('article', 'like', '%'.$find.'%')
                            ->orWhere('description', 'like', '%'.$find.'%')
                            ->orWhere('short_description', 'like', '%'.$find.'%')
                            ->orWhere('long_description', 'like', '%'.$find.'%');
                    })
                    ->orderBy('available','desc')
                    ->orderBy('price')
                    ->paginate($paginate);
            if (!$results->count()) {
                $text = 'Результаты не найдены';
            }
        } else {
            $results = collect([]);
        }

        return view('pages.search', compact('meta', 'page', 'values', 'bgImage', 'breadcrumbs', 'title', 'find', 'text', 'results'));
    }
}
