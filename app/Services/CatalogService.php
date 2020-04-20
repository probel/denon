<?php

namespace App\Services;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use Illuminate\Support\Str;
use \App\Models\{
    Product,
    ProductPrice,
    Category
};

class CatalogService
{
    public static function getFilter()
    {

        $filter = (object) [
            'available' => session('available','any'),
            'promo' => session('promo', null),
        ];
        $sort = (object) [
            'order' => 'price',
            'direction' => session('direction','asc'),
        ];
        if (request()->has('reset')) {
            $sort->direction = 'desc';
            session(['direction' => $sort->direction]);
            $filter->available = 'any';
            session(['available' => $filter->available]);
            $filter->promo = null;
            session(['promo' => $filter->promo]);
        } else {
            if (request()->has('direction') && in_array(request()->direction,['asc','desc'])) {
                $sort->direction = request()->direction;
                session(['direction' => $sort->direction]);
            }
            if (request()->has('available') && in_array(request()->available,[0,1,'any'])) {
                $filter->available = request()->available;
                session(['available' => $filter->available]);
            }
            if (request()->has('promo') && in_array(request()->promo,['gift','sale','any'])) {
                $filter->promo = request()->promo;
                session(['promo' => $filter->promo]);
            }
        }
        return [$filter,$sort];
    }
    public static function getCategories()
    {
        $categories = null;
        if (is_null($categories)) {
            $categories = Category::with('childs','parent')
                            ->withCount('childs')
                            ->active()
                            ->orderBy('order')
                            ->get();
        }
        return $categories;
    }
    public static function getCategory($id)
    {
        return self::getCategories()->find($id);
    }
    public static function getFrontProducts()
    {
        return \App\Models\Product::active()
            ->where('front',1)
            ->orderBy('order')
            ->get();
    }
    public static function getNews()
    {
        $items = \App\Models\News::active()->where('in_block',1)->get();
        return $items;
    }
}
