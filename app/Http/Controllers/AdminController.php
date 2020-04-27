<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AdminSection;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Support\Str;
use App\Jobs\UpdatePrices;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\{ ProductImport };
use \App\Models\{
    Category,
    Page,
    Product,
    News,
};

class AdminController extends Controller
{
    public function index()
    {
        if (\Auth::user()->isManager()) {
            return redirect('admin/orders');
        } else {
            return redirect('admin/orders');
        }
        $content = view('admin.dashboard', [
            'counts' => [
                'products' => \App\Models\Product::count(),
                'cities' => \App\Models\City::count(),
                'orders' => \App\Models\Order::count(),
                'reviews' => \App\Models\Review::count(),
            ],

            'orders' => \App\Models\Order::orderBy('created_at', 'desc')->limit(10)->get(),
            'callbacks' => \App\Models\Callback::orderBy('created_at', 'desc')->take(5)->get(),
            'reviews' => \App\Models\Review::orderBy('created_at', 'desc')->take(5)->get()
        ]);
        return AdminSection::view($content, '');
    }
    public function importForm()
    {
        $content = view('admin.import')->render();
        return AdminSection::view($content, 'Импорт');
    }
    public function importStore()
    {
        $extension = request()->price->getClientOriginalExtension();
        if (!in_array($extension,['csv','xls','xlsx','ods'])) {
            \MessagesStack::addError('Формат файла импорта не определен');
            return back();
        }
        $fileName = request()->price->getClientOriginalName();
        $fileArray = explode('.',$fileName);
        array_pop($fileArray);
        $fileName = Str::slug(implode('.',$fileArray), '_').'.'.$extension;
        request()->price->storeAs('prices',$fileName);
        $results = Excel::toArray(new ProductImport, storage_path('app/prices/'.$fileName));
        $priceColumn = request()->price_col;
        $articleColumn = request()->article_col;
        $availableColumn = request()->available_col;
        $dateColumn = request()->date_col;
        $multiplier = (float) request()->multiplier;
        $productCount = 0;
        $priceCount = 0;
        $availableCount = 0;
        $dateCount = 0;
        foreach ($results as $sheet) {
            foreach ($sheet as $key => $item) {
                $article = trim($item[$articleColumn]);
                if ($article) {
                    $product = Product::where('article',$article)->first();
                    if (!$product) {
                        continue;
                    }
                    $productCount ++;
                    $price = round(((float) $item[$priceColumn]) * $multiplier,0);
                    if ($price) {
                        if ($product->price != $price) {
                            $product->price = $price;
                            $product->save();
                            $priceCount ++;
                        }
                    }
                    if ($item[$availableColumn]) {
                        $available = trim($item[$availableColumn]) == 'на складе' ? 1 : 0;
                        if ($product->available != $available) {
                            $product->available = $available;
                            $product->save();
                            $availableCount ++;
                        }
                    }
                    if (trim($item[$dateColumn])) {
                        $date = \Carbon\Carbon::createFromFormat('d.m.y',trim($item[$dateColumn]));
                        if ($product->available_date != $date) {
                            $product->available_date = $date;
                            $product->save();
                            $dateCount ++;
                        }
                    } elseif ($product->available_date) {
                            $product->available_date = null;
                            $product->save();
                            $dateCount ++;
                    }
                }
            }
        }
        $message = "<div>Товары обновлены<br>
                    Найдено товаров: <strong>$productCount</strong><br>
                    <strong>Обновлено:</strong><br>
                    Цен: <strong>$priceCount</strong><br>
                    Ниличие: <strong>$availableCount</strong><br>
                    Дата поставки: <strong>$productCount</strong></div>";
        \MessagesStack::addSuccess($message);

        return back();
    }

    public function saveImage(Request $request)
    {
        $path = 'images/uploads';
        $file = request()->upload;

        $settings = [];
        $filename = $file->getClientOriginalName();
        //dd(request()->all());
        if (class_exists('Intervention\Image\Facades\Image') && (bool) getimagesize($file->getRealPath())) {

            $image = \Intervention\Image\Facades\Image::make($file);

            foreach ($settings as $method => $args) {
                call_user_func_array([$image, $method], $args);
            }

            $value = $path.'/'.$filename;

            $image->save(public_path().'/'.$value);
            $res = "<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <title>Document</title>
            </head>
            <body>
            <script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(".request()->CKEditorFuncNum.", '/".$value."');</script>
            </body>
            </html>";
            return $res;
            return response()->json(['test'=>'test'])->withCallback($request->input('callback'));
        }

        $file->move(public_path().'/'.$path, $filename);

        //S3 Implement
        $value = $path.'/'.$filename;
        $res = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(1, '/".$value."');</script>";
        return $res;
        return response()->json(['uploaded'=>1,'url' => '/'.$value, 'fileName' => $filename]);
    }
    public function saveFieldFile(Request $request)
    {
        $path = 'files/documents';
        $file = $request->file;
        $settings = [];
        $fl= $file->getClientOriginalName();
        $filename = pathinfo($fl, PATHINFO_FILENAME);
        $filename  = Str::slug($filename , '_');
        $extension = pathinfo($fl, PATHINFO_EXTENSION);
        $fn = $filename;
        $i = 1;
        while (true) {
            if (\file_exists(public_path($path.'/'.$fn.'.'.$extension))) {
                $fn = $filename.'_'.$i;
                $i++;
            } else {
                $filename = $fn.'.'.$extension;
                break;
            }
        }

        $file->move($path, $filename);
        $value = $path.'/'.$filename;
        return response()->json(['path' => asset($value), 'value' => $value]);
    }
    public function saveFieldImage(Request $request)
    {
        $path = 'images/uploads';
        $file = $request->file;
        $settings = [];
        $extension = $file->getClientOriginalExtension();
        $filename = md5($file->getClientOriginalName().time()).'.'.$extension;
        if (class_exists('Intervention\Image\Facades\Image') && (bool) getimagesize($file->getRealPath())) {

            $image = \Intervention\Image\Facades\Image::make($file);

            foreach ($settings as $method => $args) {
                call_user_func_array([$image, $method], $args);
            }

            $value = $path.'/'.$filename;

            $image->save($value);

            return response()->json(['path' => asset($value), 'value' => $value]);
        }

        $file->move($path, $filename);

        $value = $path.'/'.$filename;

        return response()->json(['path' => asset($value), 'value' => $value]);
    }
    public function saveFile(Request $request)
    {
        $path = 'files/uploads';
        $file = $request->file;
        $settings = [];
        $filename = $file->getClientOriginalName();

        $file->move($path, $filename);

        //S3 Implement
        $value = $path.'/'.$filename;

        return response()->json(['path' => asset($value), 'value' => $value]);
    }
    public function changeOrder(Request $request)
    {
        $new = (int) $request->new;
        $old = (int) $request->old;
        $model = $request->model;
        //dd($model);
        if ($new > $model::count()-1) {
            $new = $model::count()-1;
        }
        if ($new != $old) {
            if ($new < $old) {
                $model::where('order','>=',$new)->where('order','<',$old)->increment('order');
            } else {
                $model::where('order','<=',$new)->where('order','>',$old)->decrement('order');
            }
        }
        $model::where('id',$request->id)->update(['order' => $new]);
        return back();
        dd($request->all());
    }
    public function updatePrices()
    {
        \MessagesStack::addSuccess('Цены обновлены');
        UpdatePrices::dispatch();
        return redirect('\admin\products');
    }
    public function remoteUpdatePrice()
    {
        if (request()->token) {
            UpdatePrices::dispatch();
            return response()->json(['status'=>'success']);
        }
        abort(404);
    }
    public function compress()
    {
        $list = [];
        $this->listFolderFiles($list, public_path('images/uploads'));
        foreach ($list as $key => $image) {
            app(\Spatie\ImageOptimizer\OptimizerChain::class)->optimize($image);
        }
        \MessagesStack::addSuccess('Картинки сжаты');
        return redirect('\admin\products');
    }
    private function listFolderFiles(&$list,$dir){
        $ffs = scandir($dir);

        unset($ffs[array_search('.', $ffs, true)]);
        unset($ffs[array_search('..', $ffs, true)]);

        if (count($ffs) < 1)
            return;

        foreach($ffs as $ff){
            if(is_dir($dir.'/'.$ff))  {
                $this->listFolderFiles($list,$dir.'/'.$ff);
            } else {
                if (\strpos(mime_content_type($dir.'/'.$ff),'image') !== false) {
                    $list[] = $dir.'/'.$ff;
                }
            }
        }
    }
    public function downloadFile($id,$file)
    {

        $item = \App\Models\Callback::find($id);
        if ($item && ($item->files[$file] ?? null)) {
            return \Storage::download($item->files[$file]);
        }
        return back();
    }
}
