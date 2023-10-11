<?php

namespace App\Controllers;

use App\classes\Request;
use App\classes\Session;
use App\classes\Redirect;
use App\classes\CSRFToken;
use App\classes\UpdateFile;
use App\Models\Category;

class CategoryController extends BaseControllers
{
    public function index(){
        $cats = Category::all();
        //beautify($cats);
        //view("admin/category/create",compact('cats'));
    }

    public function store(){
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            beautify(Request::all());
        }else{
            Session::flash("error","CSRF Field Error");
            Redirect::back();
        }
    } 
}