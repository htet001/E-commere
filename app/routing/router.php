<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

//$router->setBasePath("/E-commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show", "Home Route");
$router->map("POST", "/cart", "App\Controllers\IndexController@cart", "Cart Route");
$router->map("GET", "/cart", "App\Controllers\IndexController@showCart", "Show Cart Route");
$router->map("POST", "/payOut", "App\Controllers\IndexController@payOut", "payOut Route");
$router->map("GET", "/product/[i:id]/detail", "App\Controllers\IndexController@productDetail", "Product Detail Route");

$router->map("POST", "/payment/stripe", "App\Controllers\PaymentController@stripePayment", "Stripe Payment Route");

require_once "admin_route.php";
require_once "user_route.php";

new RouteDispatcher($router);