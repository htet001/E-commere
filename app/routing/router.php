<?php

$router = new AltoRouter();

$router->setBasePath("/E-commerce/public");

$router->map("GET","/product","","Home Route");

$match = $router->match();

if($match){
    echo "Match";
}else{
    echo "Not Match";
}