<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;


class News extends Model
{

    use OrderableModel;
    protected $casts = [
        'fields' => 'array',
    ];
    public function scopeFindByPosition($query, $position)
    {
        return $query->where($this->getOrderField(), $position);
    }
    public function getUrl()
    {
        return route('news.show',['slug'=>$this->slug]);
    }
}
