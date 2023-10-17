<?php

use App\Routing\RouteDispatcher;

$router = new AltoRouter();

//$router->setBasePath("/E-commerce/public");

$router->map("GET", "/", "App\Controllers\IndexController@show", "Home Route");

//Admin route
$router->map("GET", "/admin", "App\Controllers\AdminController@index", "Admin Home");
$router->map("GET", "/admin/category/create", "App\Controllers\CategoryController@index", "Category Create");
$router->map("POST", "/admin/category/create", "App\Controllers\CategoryController@store", "Category Store");
$router->map("GET", "/admin/category/[i:id]/delete", "App\Controllers\CategoryController@delete", "Category Delete");
$router->map("POST", "/admin/category/update", "App\Controllers\CategoryController@update", "Category Update");
$router->map("POST", "/admin/subcategory/create", "App\Controllers\SubCategoryController@store", "Sub Category Create");
$router->map("POST", "/admin/subcategory/update", "App\Controllers\SubCategoryController@update", "Sub Category Update");

new RouteDispatcher($router);
