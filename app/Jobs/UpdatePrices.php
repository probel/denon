<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \App\Models\{Product,ProductPrice};

class UpdatePrices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $products = Product::where('remote_id','>',0)->get();
        $ids = $products->pluck('remote_id')->toArray();
        $outputArray = json_encode([
            'products' => $ids,
        ]);
        
        $data= ["data" => base64_encode($outputArray)];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://rus-crm.ru/scripts/products_availability.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close ($ch);
        $result = json_decode($result);
        if ($result->error ?? null) {
            \MessagesStack::addError('Ошибка '.$result->error);
            return;
        }
        $result = json_decode(base64_decode($result->success ?? null));
        foreach ($result as $key => $item) {
            if ($product = $products->where('remote_id',$key)->first()) {
                $price = $item->price_full_ru + $product->price_diff;
                ProductPrice::updateOrInsert(
                    ['product_id' => $product->id, 'country_id' => 1,'qty'=>1],
                    ['price' => $price]
                );
            }
        }
    }
}
