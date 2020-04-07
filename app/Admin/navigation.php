<?php

use SleepingOwl\Admin\Navigation\Page;

$items = [

    AdminSection::addMenuPage(\App\Models\Order::class)
        ->addBadge(function (){return \App\Models\Order::where('status','new')->count();})
        ->setPriority(1),
    AdminSection::addMenuPage(\App\Models\Callback::class)
        ->addBadge(function (){return \App\Models\Callback::where('status',0)->count();})
        ->setPriority(1),
    AdminSection::addMenuPage(\App\Models\Product::class)->setPriority(1),
    AdminSection::addMenuPage(\App\Models\Category::class)->setPriority(1),
    AdminSection::addMenuPage(\App\Models\Page::class)->setPriority(1),
    AdminSection::addMenuPage(\App\Models\News::class)->setPriority(1),
    AdminSection::addMenuPage(\App\Models\Config::class)->setPriority(1),
];
return $items;
