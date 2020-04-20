<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;
use App\Traits\{ SeoTrait, Status };
class Product extends Model
{
    use OrderableModel;
    use SeoTrait;
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
        'icons' => 'array',
        'params' => 'array',
        'variations' => 'array',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'available_date',
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
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function getUrl()
    {
        $path = $this->slug;
        if ($this->category) {
            $path = $this->category->getPath().'/'.$path;
        }
        $url = route('resolver',[$path]);
        return $url;
    }

    public function getMeta()
    {
        return array (1,2);
    }


    public function getImage($num = 0)
    {
        return $this->getImages()[$num] ?? ['path' => 'images/no-image.jpg','alt' => $this->name];
    }
    public function getImages()
    {
        $images = $this->images;
        if (count($this->variations ?? [])) {
            $variations = $this->variations;
            $variant = array_shift($variations);
            if (count($variant['images'] ?? [])) {
                $images = $variant['images'];
            }
        }
        return $images;
    }
}
