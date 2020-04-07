<?php

namespace App\Http\Controllers;

use App\Models\{
    Order,
    Meta
};
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cart = cartGet();
        $res = ['status' => 'success'];
        //dd(route('success'));
        if (count($cart)) {

            $order = new Order;
            $order->country_id = country()->id;
            $order->delivery = $request->cart_delivery;
            $order->fio = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->comment = $request->message;
            $order->date = time();
            $order->save();

            $res['name'] = $order->fio;
            $res['phone'] = $order->phone;
            $res['status'] = 'success';
            $total = 0;
            $items = [];
            $pids = array_keys($cart);
            $products = \App\Models\Product::whereIn('id',$pids)->get();
            foreach ($products as $product) {
                $sum = $product->getPrice()*$cart[$product->id];
                $items[] = [
                    'order_id'=>$order->id,
                    'product_id' => $product->id,
                    'price' => $sum,
                    'count' => $cart[$product->id],
                ];
                $total += $sum;
            }

            $pid = \DB::table('order_items')->insert($items);

            $order->price = $total;
            $order->save();

            Mail::to(getConfigValue('message_mail'))->send(new OrderShipped($order));



            session(['cart' => []]);
            session(['order_id' => $order->id]);
            return redirect(route('success').'/');
            $res['fields'] = [
                '.js-cart-count' => cartCount() ? ('<span class="items rounded-circle icon-center position-absolute ">'.cartCount().'</span>') : '',
                '.js-cart-sum'  => cartSum(),
                '.js-order-phone' => $request->phone,
                '.js-order-name' => $request->name,
            ];
            $res['location'] = '/success';
            $res['popup'] = '#order-pop';
        } else {
            $res['location'] = '/';
        }
        return back();
    }
    public function storeWholesale(Request $request)
    {
        $res = ['status' => 'error'];
        $order = new Order;
        $order->city = $request->city;
        $order->country_id = country()->id;
        $order->fio = $request->name;
        $order->phone = $request->phone;
        $order->date = time();
        $order->type = 'Отп';
        $order->save();

        $res['name'] = $order->fio;
        $res['phone'] = $order->phone;
        $res['status'] = 'success';
        $total = 0;
        $items = [];
        if (isset($request->product) && count($request->product)) {
            $pids = array_keys($request->product);
            $products = \App\Models\Product::whereIn('id',$pids)->get();
            foreach ($products as $product) {
                $pr = $product->getPrice();
                foreach (json_decode($product->getPrices(),true) as $cn => $p) {
                    if ($request->product[$product->id] >= $cn) {
                        $pr = $p;
                    }
                }
                $sum = $pr*$request->product[$product->id];
                $items[] = [
                    'order_id'=>$order->id,
                    'product_id' => $product->id,
                    'price' => $sum,
                    'count' => $request->product[$product->id],
                ];
                $total += $sum;
            }

            $pid = \DB::table('order_items')->insert($items);
        }
        $order->price = $total;
        $order->save();

        Mail::to(getConfigValue('message_mail'))->send(new OrderShipped($order));

        $res['total'] = number_format($total,0,'.',' ');
        $res['pid'] = $order->id;

        return response()->json($res);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $cart = cartGet();
        //if (count($cart)) {
            $pids = array_keys($cart);
            $products = \App\Models\Product::whereIn('id', $pids)->get();
            $breadcrumbs = [
                ['href'=>'/','name'=>'Главная'],
                ['href'=>'/cart','name'=>'Корзина']
            ];

            $metaEntity = Meta::find(8);
            $minPrice = \App\Models\ProductPrice::where('qty',1)->min('price');
            $meta = [
                'title' => str_replace('%min_price%',$minPrice,$metaEntity->title),
                'description' => str_replace('%min_price%',$minPrice,$metaEntity->description),
                'keywords' => str_replace('%min_price%',$minPrice,$metaEntity->keywords),
            ];

            return view('pages.cart.index',[
                    'cart'          => $cart,
                    'products'      => $products,
                    'title'         => 'Оформление заказа',
                    'breadcrumbs'   => $breadcrumbs,
                    'meta'          => $meta,
                    'view'          => 'order-cart',
                ]);
        /* } else {
            return redirect('/');
        } */
    }
    public function success()
    {
        $order_id = request()->session()->get('order_id', null);

        //session(['order_id' => 80]);
        if ($order_id && $order = Order::find($order_id)) {
            //session(['order_id' => null]);
            $meta = [
                'title' => 'Спасибо за заказ',
                'description' => rv(getConfigValue('success_description')),
                'keywords' => rv(getConfigValue('success_keywords')),
            ];
            $breadcrumbs = [
                ['href'=>'/','name'=>'Главная'],
                ['href'=>'','name'=>'Спасибо за заказ']
            ];
            return view('pages.success',[
                    'order'         => $order,
                    'title'         => 'Спасибо за заказ',
                    'meta'          => $meta,
                    'breadcrumbs'   => $breadcrumbs,
                    'view'          => 'success',
                ]);
        } else {
            return redirect('/');
        }
    }
    public function cartSet() {
        $res['status'] = 'success';
        $id = request()->id;
        $product = \App\Models\Product::findOrFail($id);

        $cart = cartGet();
        $count = (int)request()->count;
        if ($count) {
            $cart[$id] = $count;
        } else {
            unset($cart[$id]);
        }
        session(['cart' => $cart]);
        $cartCount = cartCount();
        switch (substr($cartCount, -1)) {
            case 1:
                $cartCountText = 'товар';
                break;
            case 2:
            case 3:
            case 4:
                $cartCountText = 'товара';
                break;
            default:
                $cartCountText = 'товаров';
                break;
        }
        $cartCountText = $cartCount .' '.$cartCountText;
        $res['quantity'] = cartCount();
        $res['fields'] = [
            '.js-cart-count' => cartCount() ? ('<span class="items rounded-circle icon-center position-absolute ">'.cartCount().'</span>') : '',
            '.js-cart-count-text' => $cartCountText,
            '.js-cart-sum'  => nf(cartSum()),
            '.js-cart-product'  => $product->name,
            '.js-cart-image'  => '<img class="img-fluid" src="'.asset($product->getImage()).'">',
            '.js-cart_content' => view('shared.cart.pageContent')->render(),
        ];
        if (!cartCount()) {
            $res['orderform'] = view('shared.cart.orderForm')->render();
        }
        if (!request()->cart) {
            $res['popup'] = '#confirm-pop';
        } else {
            $res['popup'] = '';
        }

        return $res;
    }
    public function quick()
    {
        if (request()->id) {
            $product = \App\Models\Product::findOrFail(request()->id);
            session(['quick' => $product->id]);
        } else {
            $product = \App\Models\Product::findOrFail(session()->get('quick', null));
        }
        if (request()->count) {
            $count = request()->count ?? 1;
            session(['quick_count' => $count]);
        } else {
            $count = session()->get('quick_count', 1);
        }
        if (request()->ajax()) {
            $content = view('shared.cart.quick',compact('count','product'))->render();
            $fields['.js-quick-content'] = $content;
            return response()->json(['status' => 'success', 'fields'=>$fields]);
        }
        $breadcrumbs = [
            ['href'=>'/','name'=>'Главная'],
            ['href'=>'','name'=>'Быстрый заказ']
        ];

        $metaEntity = Meta::find(13);
        $minPrice = \App\Models\ProductPrice::where('qty',1)->min('price');
        $meta = [
            'title' => str_replace('%min_price%',$minPrice,$metaEntity->title),
            'description' => str_replace('%min_price%',$minPrice,$metaEntity->description),
            'keywords' => str_replace('%min_price%',$minPrice,$metaEntity->keywords),
        ];
        return view('pages.cart.quick',compact('product', 'count', 'meta', 'breadcrumbs'));
    }
    public function storeQuick(Request $request)
    {

        $res = ['status' => 'success'];
        if ($id = session()->get('quick', null)) {
            $order = new Order;

            $order->fio = $request->name;
            $order->phone = $request->phone;
            $order->delivery = 'quick';
            $order->comment = '';
            $order->date = time();
            $order->save();

            $res['name'] = $order->fio;
            $res['phone'] = $order->phone;
            $res['status'] = 'success';
            $total = 0;
            $items = [];

            $product = \App\Models\Product::find($id);
            $count = session()->get('quick_count', 1);
            $sum = $product->getPrice() * $count;
            $items[] = [
                'order_id'=>$order->id,
                'product_id' => $product->id,
                'price' => $sum,
                'count' => $count,
            ];
            $total += $sum;

            $pid = \DB::table('order_items')->insert($items);

            $order->price = $total;
            $order->save();

            Mail::to(getConfigValue('message_mail'))->send(new OrderShipped($order));


            session(['quick' => null]);
            session(['order_id' => $order->id]);
            return redirect(route('success').'/');

        } else {
            $res['location'] = '/';
        }
        return back();
    }
}
