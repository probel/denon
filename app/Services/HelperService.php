<?php

namespace App\Services;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use Illuminate\Support\Str;


class HelperService
{
    public static function config($key)
    {
        $items = self::configValues();
        $value = null;
        if ($item = $items->where('key',$key)->first()) {
            $value = $item->value;
        }
        return $value;
    }
    public static function configValues()
    {
        static $items = null;
        if (\is_null($items)) {
            $items = \App\Models\Config::all();
        }
        return $items;
    }
    public static function gpu($id)
    {
        $url = '/';
        if ($page = self::pages()->find($id)) {
            $url = $page->getUrl();
        }
        return $url;
    }
    public static function pages()
    {
        static $items = null;
        if (\is_null($items)) {
            $items = \App\Models\Page::active()->get();
        }
        return $items;
    }
}
