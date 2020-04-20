<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Page;
class CartController extends Controller
{
    public function show()
    {
        $page = Page::findOrFail(5);
        $meta = $page->getMeta();
        $breadcrumbs = $page->getBreadcrumbs();
        $title = $page->title;
        $values = $page->values ?? [];
        $cart = \Cart::get();
        $emptyMessage = 'Ваша корзина пуста';
        $emptyText = '';
        if (session('ordered',false)) {
            $emptyMessage = 'Заказ успешно оформлен';
            $emptyText = 'Наш менеджер свяжется с Вами в ближайшее время.';
            session(['ordered'=> false]);
        }
        return view('pages.cart.show',compact('page','meta','breadcrumbs','emptyMessage', 'emptyText', 'title','values','cart'));
    }
    public function set()
    {
        $pid = request()->pid;
        $vid = request()->vid;
        $qty = request()->count ?? 1;

        $cart = \Cart::set($pid,$vid,$qty);

        if (request()->ajax()) {
            return response()->json($this->ajaxResponse());
        }
        return redirect(route('cart.show'));
    }
    public function remove()
    {

        $cart = \Cart::remove(request()->key);
        if (request()->ajax()) {
            return response()->json($this->ajaxResponse());
        }
        return redirect(route('cart.show'));
    }
    public function clear()
    {

        $cart = \Cart::clear();
        if (request()->ajax()) {
            return response()->json($this->ajaxResponse());
        }
        return redirect(route('cart.show'));
    }
    private function ajaxResponse()
    {
        $cart = \Cart::get();
        $res = [
            'status'    => 'success',
            'fields'    => ['.js-cart-informer' => view('shared.cart.informer')->render()],
            'total'     => number_format($cart->total,0,'.',' '),
        ];
        if (!$cart->count) {
            $res['location'] = route('cart.show');
        }
        if (request()->confirm) {
            $res['popup'] = view('shared.cart.popup')->render();
        }
        if (request()->iscart) {
            $res['fields']['.js-cart-content'] = view('shared.cart.content')->render();
        }
        return $res;
    }
}
