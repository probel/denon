<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'files' => 'array',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
