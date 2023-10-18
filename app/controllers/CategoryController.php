<?php

namespace App\Controllers;

use Dotenv\Validator;
use App\classes\Request;
use App\classes\Session;
use App\Models\Category;
use App\classes\Redirect;
use App\classes\CSRFToken;
use App\classes\UpdateFile;
use App\Models\SubCategory;
use App\classes\ValidateRequest;

class CategoryController extends BaseControllers
{
    public function index(){
        $categories = Category::all()->count();
        list($cats,$pages) = paginate(3,$categories,new Category());

        $subcategories = SubCategory::all()->count();
        list($sub_cats,$sub_pages) = paginate(3,$subcategories,new SubCategory());

        $cats = json_decode(json_encode($cats));
        $sub_cats = json_decode(json_encode($sub_cats));
        view("admin/category/create",compact('cats','pages','sub_cats','sub_pages'));
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
                $errors = $validator->getError();

                $categories = Category::all()->count();
                list($cats,$pages) = paginate(3,$categories,new Category());
                $cats = json_decode(json_encode($cats));
                view("admin/category/create",compact('cats','errors','pages'));
            }else{
                $slug = slug($post->name);
                $con = Category::create([
                    "name" => $post->name,
                    "slug" => $slug
                ]);
                if($con){
                    $success = "    Category Created Successfully";

                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories,new Category());
                    $cats = json_decode(json_encode($cats));
                    view("admin/category/create",compact('cats','success','pages'));
                }else{
                    $errors = "    Category Created Fail";

                    $categories = Category::all()->count();
                    list($cats,$pages) = paginate(3,$categories,new Category());
                    $cats = json_decode(json_encode($cats));
                    view("admin/category/create",compact('cats','errors','success','pages'));
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
                "name"=>["unique"=>"sub_categories","minLength"=>"5"]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post,$rules);

            if($validator->getError()){
                header('HTTP/1.1 422 Validation Error',true,422);
                $errors = $validator->getError();
                echo json_encode($errors);
                exit;
            }else{
                Category::where("id",$post->id)->update(["name"=>$post->name]);  
                    echo "Sub Category Edited Successfully";
                    exit;
            }
        }else{
            header('HTTP/1.1 422 Token Mis Match Error',true,422);
            echo "Token Mis Match Error";
            exit;
        }
    }
}