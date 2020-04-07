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
    public static function getMinPrice()
    {
        static $pr = null;
        if (\is_null($pr)) {
            /*
                Мы не можем выбрать просто минимальную цену,
                так как есть разные страны, в них цены могут как указываться,
                так и рассчитываться по курсу из цены в России.
            */
            $prices = ProductPrice::with('product')
                                    ->where('price','>',0)
                                    ->where('country_id',1)
                                    ->where('qty',1)
                                    ->orderBy('price')
                                    ->get();
            $pr = 0;
            foreach ($prices as $key => $price) {
                if ($price->product->status == 1) {
                    $pr = $price->product->getPrice();
                    break;
                }
            }
        }
        return $pr;
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
    public static function getFrontAccessory($amount = 1000)
    {
        return \App\Models\Product::where('status',1)
            ->where('front',1)
            ->where('accessory',1)
            ->take($amount)
            ->orderBy('order')
            ->get();
    }
}
