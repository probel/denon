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
            $categories = Category::with(['parent','childs'])
                            ->withCount('childs','products')
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
    public static function getFrontCategory()
    {
        static $category = null;
        if (is_null($category)) {
            $category = self::getCategories()->where('products_count','>',0)->first();
        }
        return $category;
    }
    public static function getNews()
    {
        $items = \App\Models\News::active()->where('in_block',1)->get();
        return $items;
    }
}
