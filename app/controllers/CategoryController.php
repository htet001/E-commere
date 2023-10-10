<?php

namespace App\Controllers;

use App\classes\Request;

class CategoryController extends BaseControllers
{
    public function index(){
       view("admin/category/create");
    }

    public function store(){
        beautify(Request::all(true));
    }
}