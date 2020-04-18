<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ SeoTrait, Status };
use SleepingOwl\Admin\Traits\OrderableModel;

class Page extends Model
{
    use OrderableModel;
    use SeoTrait;
    use Status;

    public function scopeFindByPosition($query, $position)
    {
        return $query->where($this->getOrderField(), $position);
    }

    protected $casts = [
        'values' => 'array'
    ];


    protected $attributes = [
        'order' => false,
    ];

    protected $fillable = [
        'order',
    ];

    public function getUrl()
    {
         return route('resolver', [$this->slug]);
    }
    public function getMeta()
    {
        return array (1,2,3);
    }
    /**
    * Здесь забираем верхнее меню для главной страницы
    *
    */
    public static function getTitleList()
    {
        //\Schema::getColumnListing((new User)->getTable());
        $arTopMenu = array ('warranty',
                      'delivery',
                      'contacts',
                      'news',
                      'installation');

        return Page::where('status', 1)->whereIn('slug', $arTopMenu)->orderby('order','asc')->get();
    }

    public function getBreadcrumbs()
    {
        $breadcrumbs = [
            ['href'=>'/','name'=>'Denon'],
            ['href'=> '','name'=>$this->name],
        ];
    }
}
