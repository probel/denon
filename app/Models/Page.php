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
        'values' => 'array'
    ];
    public function getBreadcrumbs()
    {
        $breadcrumbs = [
            ['href'=>'/','name'=>'Denon'],
            ['href'=> '','name'=>$this->name],
        ];
    }
    public function getUrl()
    {
        return route('resolver',['slug'=>$this->slug]);
    }
}
