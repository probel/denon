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

    public function getUrl()
    {
         return route('resolver', [$this->slug]);
    }

    public function getBreadcrumbs()
    {
        $breadcrumbs = [
            ['href'=>'/','name' => 'Denon'],
            ['href'=> '','name' => $this->title],
        ];
        return $breadcrumbs;
    }
}
