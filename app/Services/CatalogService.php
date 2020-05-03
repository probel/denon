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
    public static function getFrontDefaultCategory()
    {
        static $default = null;
        if (\is_null($default)) {
            $category = self::getFrontCategory();
            if ($category) {
                $default = $category->id;
            } else {
                $default = false;
            }
        }
        return $default;
    }
    public static function getFrontCategory()
    {
        static $category = null;
        if (is_null($category)) {
            $category = self::getCategories()->where('products_count','>',0)->where('default',1)->first();
        }
        return $category;
    }
    public static function getFrontProducts()
    {
        static $products = null;
        if (is_null($products)) {
            $category = self::getFrontCategory();
            if ($category) {
                $products = $category->products()->active()->orderBy('order')->take(8)->get();
            } else {
                $products = Product::active()
                            ->where(function ($query) {
                                $query->where('old_price','>',0)
                                    ->orWhere('gift',1);
                            })
                            ->orderBy('order')
                            ->take(8)
                            ->get();
            }
        }
        return $products;
    }
    public static function getNews()
    {
        $items = \App\Models\News::active()->where('in_block',1)->get();
        return $items;
    }
}
