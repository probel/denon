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
    Category,
    Page,
    City,
    Country
};

class MainService
{
    public static function countries()
    {
        static $countries = null;
        if (\is_null($countries)) {
            $countries = Country::with('corrects.correct')->whereStatus(1)->get();
        }
        return $countries;
    }
    public static function cities()
    {
        static $cities = null;
        if (\is_null($cities)) {
            $cities = City::where('country_id',country()->id)->get();
        }
        return $cities;
    }
    public static function pages()
    {
        static $pages = null;
        if (\is_null($pages)) {
            $pages = Page::whereStatus(1)->get();
        }
        return $pages;
    }
    public static function categories()
    {
        static $categories = null;
        if (\is_null($categories)) {
            $categories = Category::with('products.prices')
                            ->whereStatus(1)
                            ->orderBy('order')
                            ->get();
                        //->where('country_id',country()->id)
            //->orderBy('order')
            //->get();

        }
        return $categories;
    }
    public static function categoriesMain()
    {
        $categories = self::categories();
        $categories = $categories->filter(function ($category, $key) {
            return $category->show_catalog && $category->products->where('accessory',0)->count();
        });
        return $categories;
    }
    public static function categoriesAccessory()
    {
        $categories = self::categories();
        $categories = $categories->filter(function ($category, $key) {
            return $category->show_catalog && $category->products->where('accessory',1)->count();
        });
        return $categories;
    }
    public static function products()
    {
        static $products = null;
        if (\is_null($products)) {
            $products = Product::with('prices','categories')->whereStatus(1)->orderBy('order')->get();
        }
        return $products;
    }
}
