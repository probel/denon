<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;


trait Status
{
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

}
