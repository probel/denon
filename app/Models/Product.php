<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ MetaTags, Status };
class Product extends Model
{
    use OrderableModel;
    use MetaTags;
    use Status;
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
    protected $casts = [
        'images' => 'array',
        'params' => 'array',
        'variations' => 'array',
    ];
    protected $fillable = [
        'name', 'slug'
    ];
    /**
     * Один ко многим с категорией
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getUrl()
    {
        $url = route('resolver',[$this->slug]);

        return $url;
    }

    public function getImage($num = 0)
    {
        return $this->images[$num] ?? '';
    }
}
