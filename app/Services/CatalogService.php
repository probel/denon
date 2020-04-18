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
    public static function getMeta($model)
    {
        $meta = [
            'title' =>  $model->meta_title,
            'description' => $model->meta_description,
            'keywords' => $model->meta_keywords,
        ];
        return $meta;
    }

    public static function getFrontProducts($amount = 1000)
    {
        return \App\Models\Product::where('status',1)
            ->where('front',1)
            ->where('accessory',0)
            ->take($amount)
            ->orderBy('order')
            ->get();
    }
    public static function getNews()
    {
        return \App\Models\News::active()->where('in_block',1)->get();
    }
}
