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
        $values = $page->values ?? [];
        $cart = \Cart::get();
        return view('pages.cart.show',compact('page','meta','breadcrumbs','values','cart'));
    }
    public function set()
    {
        $pid = request()->pid;
        $vid = request()->vid;
        $qty = request()->qty ?? 1;
        
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
            'status' => 'success',
            'informer' => view('shared.cart.informer')->render(),
            'total' => number_format($cart->total,0,'.',' '),
        ];
        if (request()->iscart) {
            $res['content'] = view('shared.cart.content')->render();
        }
        return $res;
    }
}
