<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ SeoTrait, Status, ArticleTrait };

class Promo extends Model
{

    use OrderableModel;
    use SeoTrait;
    use Status;
    use ArticleTrait;

    protected $casts = [
        'values' => 'array',
    ];
    public function scopeFindByPosition($query, $position)
    {
        return $query->where($this->getOrderField(), $position);
    }
    public function getUrl()
    {
        return route('promo.show',['slug'=>$this->slug]);
    }
    public function getBreadcrumbs()
    {
        $breadcrumbs = [
            ['href'=>'/','name' => 'Denon'],
            ['href'=> route('promo.index'), 'name' => 'Акции'],
            ['href'=> '','name' => $this->title],
        ];
        return $breadcrumbs;
    }
}
