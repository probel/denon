<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{ MetaTags, Status };
use SleepingOwl\Admin\Traits\OrderableModel;

class Page extends Model
{
    use OrderableModel;
    use MetaTags;
    use Status;

    public function scopeFindByPosition($query, $position)
    {
        return $query->where($this->getOrderField(), $position);
    }

    protected $casts = [
        'data' => 'array'
    ];

    public function getUrl()
    {
        return route('page', [$this->slug]);
    }

    /**
    * Здесь забираем верхнее меню для главной страницы
    * 
    */
    public static function getTitleList()
    {
        $arTopMenu = array ('warranty',
                      'delivery',
                      'contacts',
                      'news',
                      'installation');
            
        return Page::where('status', 1)->whereIn('slug', $arTopMenu)->orderBy('order_by', 'desc');->get();
    }    
    
}
