<?php

namespace App\Http\Controllers;

use App\Models\{
    Blog,
    News,
    Promo,
    Page,
    Meta
};
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function newsIndex()
    {
        $class = "blog-page";
        $articles = News::where('status',1)
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('order','desc')->paginate(9);
        /* META */
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => '', 'name' => 'Новости']
        ];
        $meta = array ('meta', 'meta');
        $title = 'Новости';
        $view = 'articles news';
        $date = true;
        $page = "sdsdfsd";
        $news = \App\Models\News::get();
        return view('pages.article.index',compact('articles','page', 'view','date','title','meta','class','breadcrumbs','news'));
    }
    public function promoIndex()
    {
        $this->updatePromoDates();
        $class = "blog-page";
        $articles = Promo::where('status',1)
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('order','desc')->paginate(9);

        /* META */
        $metaEntity = Meta::find(10);
        $meta = [
            'title' => $metaEntity->title,
            'description' => $metaEntity->description,
            'keywords' => $metaEntity->keywords,
        ];
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => '', 'name' => 'Акции']
        ];
        $title = 'Акции';
        $view = 'articles promos';
        $date = true;
        return view('pages.article.index',compact('articles','view','date','title','meta','class','breadcrumbs'));
    }
    public function blogIndex()
    {
        $class = "blog-page";
        $articles = Blog::where('status',1)
                    ->whereDate('created_at','<=',\Carbon\Carbon::Now())
                    ->orderBy('order','desc')->paginate(9);
        /* META */
        $metaEntity = Meta::find(3);
        $meta = [
            'title' => $metaEntity->title,
            'description' => $metaEntity->description,
            'keywords' => $metaEntity->keywords,
        ];
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => '', 'name' => 'Статьи']
        ];
        $title = 'Статьи';
        $view = 'articles';
        return view('pages.article.index',compact('articles','view','title','meta','class','breadcrumbs'));
    }
    public function newsShow($slug)
    {
        $article = News::where('status',1)->where('slug',$slug)->first();
        if (!$article) {
            abort(404);
        }
        $metaEntity = Meta::find(11);
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => route('news.index').'/', 'name' => 'Новости'],
            ['href' => '', 'name' => $article->title],
        ];
        $view = 'articles';
        return $this->show($article,$metaEntity,$breadcrumbs,$view);
    }
    public function promoShow($slug)
    {
        $this->updatePromoDates();
        $article = Promo::where('status',1)->where('slug',$slug)->first();
        if (!$article) {
            abort(404);
        }
        $metaEntity = Meta::find(12);
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => route('promo.index').'/', 'name' => 'Акции'],
            ['href' => '', 'name' => $article->title],
        ];
        $view = 'articles promo-page';
        return $this->show($article,$metaEntity,$breadcrumbs,$view);
    }
    public function blogShow($slug)
    {
        $article = Blog::where('status',1)->where('slug',$slug)->first();
        if (!$article) {
            abort(404);
        }
        $metaEntity = Meta::find(4);
        $breadcrumbs = [
            ['href' => route('front'), 'name' => 'Главная'],
            ['href' => route('blog.index').'/', 'name' => 'Блог'],
            ['href' => '', 'name' => $article->title],
        ];
        return $this->show($article,$metaEntity,$breadcrumbs);
    }
    private function show($article,$metaEntity,$breadcrumbs, $view = '')
    {

        $class = "blog-page";
        $view = $view ?? 'articles';
        $metaTitle =  $article->meta_title ? $article->meta_title : $metaEntity->title;
        $metaTitle = \str_replace(['%title%','%description%',],[strip_tags($article->title),strip_tags($article->description)],$metaTitle);

        $metaDescription =  $article->meta_description ?? $metaEntity->description;
        $metaDescription = \str_replace(['%title%','%description%',],[strip_tags($article->title),strip_tags($article->description)],$metaDescription);

        $metaKeywords =  $article->meta_title ?? $metaEntity->keywords;
        $metaKeywords = \str_replace(['%title%','%description%',],[strip_tags($article->title),strip_tags($article->description)],$metaKeywords);
        $meta = [
            'title' =>  $metaTitle,
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
        ];

        $title = $article->title;

        return view('pages.article.show',compact('article','view','title','meta','class','breadcrumbs'));
    }
    public function storeComment(Request $request)
    {
        //dd(request()->all());
        if ($request->ajax() && $request->name && $request->message) {
            $comment = new \App\Models\Comment();
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->message = $request->message;
            $comment->city = $request->city;
            $comment->blog_id = $request->blog_id;
            if (!$request->agreement) {
                $comment->save();
            }
            $res = [
                'status' => 'success',
                'popup'=> '#confirm-review',
                'fields'=> [
                    '.js-review-modal-title' => 'Спасибо, '.$comment->name.'!',
                    '.js-review-modal-text' => 'Ваш комментарий успешно добавлен. После прохождения модерации, он будет показан на сайте.',
                ]
            ];

            return response()->json($res);
        } else {
            return response()->json($request->all());
            //abort(404);
        }
    }
    private function updatePromoDates()
    {
        $now = \Carbon\Carbon::now();
        $promos = Promo::where('date_auto',1)
                        ->whereDate('date','<=', $now)
                        ->update(['date'=>$now->addDays(15)]);
    }
}
