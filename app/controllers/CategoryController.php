<?php

namespace App\Controllers;

use App\classes\Request;
use App\classes\Session;
use App\classes\Redirect;
use App\classes\CSRFToken;
use App\classes\UpdateFile;
use App\classes\ValidateRequest;
use App\Models\Category;
use Dotenv\Validator;

class CategoryController extends BaseControllers
{
    public function index(){
        $categories = Category::all()->count();
        list($cats,$pages) = paginate(3,$categories,new Category());
        $cats = json_decode(json_encode($cats));
        view("admin/category/create",compact('cats','pages'));
    }

    public function store(){
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" =>5,"unique" => "categories"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);
            if($validator->hasError()){
                $cats = Category::all();
                $errors = $validator->getError();
                view("admin/category/create",compact('cats','errors'));
            }else{
                $slug = slug($post->name);
                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);
                if($con){
                    $cats = Category::all();
                    $success = "    Category Created Successfully";
                    view("admin/category/create",compact('cats','success'));
                }else{
                    echo "Fail";
                }
            }
        }else{
            Session::flash("error","CSRF Field Error");
            Redirect::back();
        }
    } 

    public function delete($id){
        $con = Category::destroy($id);
        if($con){
            Session::flash("delete_success","Category Delete Successfully");
            Redirect::to("/admin/category/create");
        }else{
            Session::flash("delete_fail","Category Deletion Fail");
            Redirect::to("/admin/category/create");
        }
    }

    public function update(){
        $post = Request::get('post');

        if(CSRFToken::checkToken($post->token)){
            $rules = [
                "name" => ["required" => true, "minLength" =>5,"unique" => "categories"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);

            if($validator->hasError()){
                header('HTTP/1.1 422 Validation Error!',true,422);
                echo json_encode($validator->getError());
            }else{
                Category::where("id",$post->id)->update(["name"=>$post->name]);
                $data['con'] = "Good To Go";
                echo json_encode($data);
            }
        }else{
            header('HTTP/1.1 422 Token Mis-Match Error!',true,422);
            echo json_encode(["error"=>"Token Mis-Match Error"]);
        }
    }
}