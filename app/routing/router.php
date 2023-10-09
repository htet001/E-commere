<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

$router->setBasePath("/E-commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show", "Home Route");

// $match = $router->match();

// if($match){
//     echo "<pre>".print_r($match,true)."</pre>";
// }else{
//     echo "Not Match";
// }

new RouteDispatcher($router);
