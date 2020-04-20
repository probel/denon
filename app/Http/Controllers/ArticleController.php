<?php

namespace App\Http\Controllers;

use App\Models\{
    Installation,
    News,
    Promo,
    Page,
};
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($page,$articles)
    {
        $breadcrumbs = $page->getBreadcrumbs();
        $meta = $page->getMeta();
        $title = $page->title;
        return view('pages.article.index',compact('articles', 'page', 'title', 'meta', 'breadcrumbs'));
    }
    public function newsIndex()
    {
        $page = Page::find(6);
        $articles = News::active()
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('created_at','desc')
                    ->paginate($page->values['paginate'] ?? 6);

        return $this->index($page,$articles);
    }
    public function promoIndex()
    {
        $page = Page::find(8);
        $articles = Promo::active()
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('created_at','desc')
                    ->paginate($page->values['paginate'] ?? 6);

        return $this->index($page,$articles);
    }
    public function installationIndex()
    {
        $page = Page::find(7);
        $articles = Installation::active()
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('created_at','desc')
                    ->paginate($page->values['paginate'] ?? 6);

        return $this->index($page,$articles);
    }

    private function show($article)
    {
        if (!$article) abort(404);
        $breadcrumbs = $article->getBreadcrumbs();
        $meta = $article->getMeta();
        $title = $article->title;
        return view('pages.article.show',compact('article', 'title', 'meta', 'breadcrumbs'));
    }
    public function newsShow($slug)
    {
        $article = News::active()->where('slug',$slug)->first();
        return $this->show($article);
    }
    public function promoShow($slug)
    {
        $article = Promo::active()->where('slug',$slug)->first();
        return $this->show($article);
    }
    public function installationShow($slug)
    {
        $article = Installation::active()->where('slug',$slug)->first();
        return $this->show($article);
    }
}
