<?php

function nf($number) {
    return number_format($number,0,'.',' ');
}


function fitImage($image, $width = null, $height = null,$jpg = false,$qt = 90)
{
    $i = $image;
    $fileA = explode('/',$image);
    if ($image && ($width != null || $height != null)) {
        $folder = 'images/styles/fit_'.$width.'x'.$height;
        $fileName = array_pop($fileA);

        $image = $folder.'/'.$fileName;

        $image = str_replace('.png','.jpg',$image);
        //dd($image);
        if(!file_exists($image) && file_exists($i)) {

            $img = \Image::make($i);
            $img->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            });
            @mkdir(base_path().'/public/'.$folder,0777,true);
            //dd($folder.'/'.($image));

            $img->encode('jpg');
            $img->save(base_path().'/public/'.($image),100);

            //app(\Spatie\ImageOptimizer\OptimizerChain::class)->optimize(public_path($image));

        }
    }
    return $image;
}
function resizeImage($image, $width = null, $height = null,$jpg = false,$qt = 90)
{
    $i = $image;
    $fileA = explode('/',$image);
    if ($image && ($width != null || $height != null)) {
        $folder = 'images/styles/size_'.$width.'x'.$height;
        $fileName = array_pop($fileA);

        $image = $folder.'/'.$fileName;

        if((!file_exists($image) && file_exists($i))) {

            $img = \Image::make($i);
            if ($img->width() > $img->height()) {
                $img->resize($width, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                },'center');
            } else {
                $img->resize(null, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                },'center');
            }
            $bg = \Image::canvas($width,$height);
            $bg->insert($img,'center');
            @mkdir(base_path().'/public/'.$folder,0777,true);
            //dd($folder.'/'.($image));

            //$img->encode('jpg');
            $img->save(base_path().'/public/'.($image),100);

            //app(\Spatie\ImageOptimizer\OptimizerChain::class)->optimize(public_path($image));

        }
    }
    return $image;
}

function ppId($id)
{
    $url = '';
    $page = \App\Models\Page::find($id);
    if ($page) {
        $url = route('page.show',['slug'=>$page->slug]);
    }
    return $url.'/';
}

