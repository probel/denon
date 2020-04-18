<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ SeoTrait, Status };

class News extends Model
{

    use OrderableModel;
    use SeoTrait;
    use Status;

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
    public function getMeta()
    {
        return array ("111", "222");
    }
}
