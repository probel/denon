<?php
namespace App\Traits;

trait MetaTags
{
    public function getMeta()
    {
        $meta = [
            'title' =>  $this->meta_title ?? ($this->name ?? $this->title),
            'description' => $this->meta_description,
            'keywords' => $this->meta_keywords,
        ];
        return $meta;
    }

}
