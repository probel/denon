<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ SeoTrait, Status, ArticleTrait };

class News extends Model
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
        return route('news.show',['slug'=>$this->slug]);
    }
    public function getBreadcrumbs()
    {
        $breadcrumbs = [
            ['href'=>'/','name' => 'Denon'],
            ['href'=> route('news.index'), 'name' => 'Новости'],
            ['href'=> '','name' => $this->title],
        ];
        return $breadcrumbs;
    }
}
