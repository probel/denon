<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ SeoTrait, Status };

class Category extends Model
{
    use OrderableModel;
    use SeoTrait;
    use Status;

    protected $casts = [
        'values' => 'array'
    ];
    protected $with = ['parent'];
    /**
     * @param $query
     * @param int $position
     *
     * @return mixed
     */
    public function scopeFindByPosition($query, $position)
    {
        return $query->where($this->getOrderField(), $position);
    }
    /* public function products()
    {
        return $this->hasMany('App\Models\Product');
    } */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function getPath()
    {
        $path = $this->slug;
        if ($this->parent_id) {
            $path = $this->parent->getPath().'/'.$path;
        }
        return $path;
    }
    public function getUrl()
    {
        return route('resolver',[$this->getPath()]);
    }
    public function getTitle()
    {
        return $this->id == 20 ? str_replace('PRO','<span class="white">PRO</span>',$this->title) : $this->title;
    }
}
