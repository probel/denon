<?php
namespace App\Traits;
use Illuminate\Support\Str;

trait SeoTrait
{
    protected static function booted()
    {
        static::saving(function ($model) {
            $class = get_class($model);
            $i = 0;
            while(true) {
                $slug = $model->slug ? $model->slug : Str::slug(($model->name ? $model->name : $model->title), '-');
                if ($i) {
                    $slug .= '_'.$i;
                }
                $is = $class::where('slug', $slug)->where('id', '!=', $model->id)->first();
                $i++;
                if (!$is) {
                    break;
                }
            }
            if (!$model->slug || $i) {
                $model->slug = $slug;
            }

            if (!$model->meta_title) {
                $model->meta_title = $model->name ?? $model->title;
            }
        });
    }
    public function getMeta()
    {
        $meta = [
            'title' =>  $this->meta_title,
            'description' => $this->meta_description,
            'keywords' => $this->meta_keywords,
        ];
        return $meta;
    }

}
