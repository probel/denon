<?php

namespace App\Http\Controllers;

use App\Models\{
    Page,
    Meta
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
        $meta = "dsfgsdfgsdfgsd";
        $page = Page::find(1)->get();
        $breadcrumbs = "8974832957389";
        $search = "dsfgdsfgsdfgds";
        $results = "dsfgdsfgdf";
        $response['search'] = "43872389472189347";
        $response = $response['search'];
        return view('pages.search', compact('meta', 'page', 'breadcrumbs', 'search', 'results', 'response'));
    }
}
