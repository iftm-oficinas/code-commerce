<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');
        $categories = Category::all();

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal(),]);
            foreach ($cart->all() as $k => $item) {
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }
            $cart->clear();
            event(new CheckoutEvent());
            return view('store.checkout', compact('order'), ['cart' => $cart, 'categories' => $categories]);
        }

        return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }

    public function test(Che $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisao LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        redirect($response->getRedirectionUrl());
    }


}
