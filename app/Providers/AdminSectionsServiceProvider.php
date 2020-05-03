<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use App\Admin\Widgets\NavigationUserBlock;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;

class AdminSectionsServiceProvider extends ServiceProvider
{
    protected $widgets = [
        NavigationUserBlock::class
    ];
    /**
     * @var array
     */
    protected $sections = [
        //\App\Models\User::class => 'App\Http\Sections\Users',
        \App\Models\Order::class => 'App\Http\Admin\Order',
        \App\Models\Callback::class => 'App\Http\Admin\Callback',
        \App\Models\Category::class => 'App\Http\Admin\Category',
        \App\Models\Page::class => 'App\Http\Admin\Page',
        \App\Models\Product::class => 'App\Http\Admin\Product',
        \App\Models\Config::class => 'App\Http\Admin\Config',
        \App\Models\News::class => 'App\Http\Admin\News',
        //\App\Models\Promo::class => 'App\Http\Admin\Promo',
        //\App\Models\Installation::class => 'App\Http\Admin\Installation',
    ];


    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
        $widgetsRegistry = $this->app[\SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface::class];

        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }
}
