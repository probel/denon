<?php

namespace App\Services;

use Illuminate\Support\Str;
use \App\Models\{Product};

class CartService
{
    public static function get($isUpdate = false)
    {
        static $cart = null;
        if (is_null($cart) || $isUpdate) {

            $data = self::getStored();
            $pids = array_column($data, 'pid');
            $products = Product::whereIn('id',$pids)->get();
            $cart = (object) ['items' => collect(),'total' => 0,'positions' => 0, 'count'=> 0];
            foreach ($data as $key => $item) {
                if ($product = $products->find($item['pid'])) {
                    $qty = $item['qty'] ?? 1;
                    $price = $product->price ?? 0;
                    $total = $price * $qty;
                    $variation = $product->variations[$item['vid']] ?? null;
                    $cartItem = [
                        'key'       => $item['key'] ?? $key,
                        'pid'       => $item['pid'],
                        'vid'       => $item['vid'],
                        'product'   => $product,
                        'variation' => $variation,
                        'qty'       => $qty,
                        'price'     => $price,
                        'total'     => $total,
                    ];
                    $cart->total += $total;
                    $cart->positions ++;
                    $cart->count += $qty;
                    $cart->items->push((object) $cartItem);
                }
            }
        }
        return $cart;
    }

    public static function set($pid,$vid = null, $qty = 1)
    {
        $cart = self::getStored();

        $product = Product::find($pid);
        if ($product) {

            if (is_null($vid) || !isset($product->variations[$vid])) {
                if (is_array($product->variations)) {
                    $vid = array_key_first($product->variations);
                } else {
                    $vid = null;
                }
            }
            $key = md5($pid.$vid);
            $cart[$key] = [
                'key' => $key,
                'qty' => $qty,
                'pid' => $pid,
                'vid' => $vid,
            ];
            session(['cart' => $cart]);
        }
        $cart = self::get(true);
        return $cart;
    }
    public static function remove($key)
    {
        $cart = self::getStored();
        unset($cart[$key]);
        session(['cart' => $cart]);
        $cart = self::get(true);
        return $cart;
    }
    public static function clear()
    {

        session(['cart' => []]);
        $cart = self::get(true);
        return $cart;
    }
    private static function getStored()
    {
        $cart = session('cart', []);
        return $cart;
    }
}
