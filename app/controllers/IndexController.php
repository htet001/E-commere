<?php

namespace App\controllers;

use App\classes\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\classes\Request;
use App\classes\Session;
use App\classes\CSRFToken;
use App\Models\OrderDetail;

class IndexController extends BaseControllers
{
    public function show()
    {
        $count = Product::all()->count();
        list($pros, $pages) = paginate(6, $count, new Product());
        $products = json_decode(json_encode($pros));
        $featured = Product::where("featured", 2)->get();
        $myan = Product::where("featured", 3)->get();
        $jersey = Product::where("featured", 1)->get();
        view("home", compact('products', 'pages', 'featured', 'myan', 'jersey'));
    }

    public function cart()
    {
        $post = Request::get('post');
        if (CSRFToken::checkToken($post->token)) {
            $items = $post->cart;
            $carts = [];

            foreach ($items as $item) {
                $products = Product::where("id", $item)->first();
                $products->qty = 1;
                array_push($carts, $products);
            }
            echo json_encode($carts);
            exit;
        } else {
            echo "Token Miss Match Error";
            exit;
        }
    }

    public function payOut()
    {
        $post = Request::get('post');
        if (CSRFToken::checkToken($post->token)) {
            Session::replace("cart_items", $post->items);
            echo "Success";
            exit;
        } else {
            echo "Token Miss Match Error";
            exit;
        }
    }

    public function saveItemsToDatabase($status = "Pending", $extraData = "")
    {
        $items = Session::get("cart_items");
        $order_number = uniqid();
        $total = 0;

        foreach ($items as $item) {
            $total += $item->qty * $item->price;
            $od = new OrderDetail();

            $od->user_id = Auth::user()->id;
            $od->product_id = $item->id;
            $od->unit_price = $item->price;
            $od->status = $status;
            $od->quantity = $item->qty;
            $od->total = $item->qty * $item->price;
            $od->order_no = $order_number;

            $od->save();
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_no = $order_number;
        $order->order_extra = $extraData;

        $order->save();

        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->amount = $total;
        $payment->status = $status;
        $payment->order_no = $order_number;

        if ($payment->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function saveOrder($orders)
    {
        $order = serialize($orders);
        return true;
    }

    public function showCart()
    {
        view('cart');
    }

    public function productDetail($id)
    {
        $product = Product::where("id", $id)->first();
        return view('product', compact('product'));
    }
}