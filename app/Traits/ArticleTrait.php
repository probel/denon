<?php
namespace App\Traits;

trait ArticleTrait
{

    public function getPrev()
    {
        static $article = false;
        if ($article === false) {
            $class = get_class($this);
            $article = $class::active()
                            ->whereDate('created_at','<=',$this->created_at)
                            ->where('id', '!=', $this->id)
                            ->orderBy('created_at','desc')
                            ->first();
            if (!$article) {
                $article = $class::active()
                            ->where('id', '!=', $this->id)
                            ->orderBy('created_at','desc')
                            ->first();
            }
        }
        return $article;
    }
    public function getNext()
    {
        static $article = false;
        if ($article === false) {
            $class = get_class($this);
            $article = $class::active()
                            ->whereDate('created_at','>=',$this->created_at)
                            ->where('id', '!=', $this->id)
                            ->orderBy('created_at')
                            ->first();
            if (!$article) {
                $article = $class::active()
                            ->where('id', '!=', $this->id)
                            ->orderBy('created_at')
                            ->first();
            }
        }
        return $article;
    }

}
