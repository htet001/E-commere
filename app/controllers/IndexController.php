<?php

namespace App\controllers;

use App\classes\CSRFToken;
use App\Models\Product;
use App\classes\Request;
use App\classes\Session;
use Illuminate\Support\Facades\Redis;

class IndexController extends BaseControllers
{
    public function show()
    {
        $count = Product::all()->count();
        list($pros,$pages) = paginate(6,$count,new Product());
        $products = json_decode(json_encode($pros));
        $featured = Product::where("featured",2)->get();
        $myan = Product::where("featured",3)->get();
        $jersey = Product::where("featured",1)->get();
        view("home",compact('products','pages','featured','myan','jersey'));
    }

    public function cart(){
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            $items = $post->cart;
        $carts =[];

        foreach($items as $item){
            $products = Product::where("id",$item)->first();
            $products->qty =1;
            array_push($carts,$products);
        }
        echo json_encode($carts);
        exit;
        }else{
            echo "Token Miss Match Error";
            exit;
        }
    }

    public function payOut(){
        $post = Request::get('post');
        if(CSRFToken::checkToken($post->token)){
            if($this->saveOrder($post->items)){
                echo "Success";
                exit;
            }else{
                echo"Product Save Fail";
                exit;
            }
        }else{
            echo "Token Miss Match Error";
            exit;
        }
    }

    public function saveOrder($orders){
        $order = serialize($orders);
        return true;
    }

    public function showCart(){
        view('cart');
    }
}
