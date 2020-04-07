<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class Category extends Model
{
    use OrderableModel;

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
        return $this->belongsTo('App\Models\Category','parent_id');
    }
    public function childs()
    {
        return $this->hasMany('App\Models\Category','parent_id');
    }
    public function getPath()
    {
        $path = $this->slug;
        return $path;
    }
    public function getUrl()
    {
        return route('catalog.category',[$this->getPath()]).'/';
    }
}
