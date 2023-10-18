<?php
namespace App\Controllers;

use App\classes\Request;
use App\classes\Session;
use App\classes\Redirect;
use App\classes\CSRFToken;
use App\Models\SubCategory;
use App\classes\ValidateRequest;
use App\Controllers\BaseControllers;


class SubCategoryController extends BaseControllers{
    public function store(){
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
                $subcat = new SubCategory();
                $subcat->name = $post->name;
                $subcat->cat_id = $post->parent_cat_id;

                if($subcat->save()){
                    echo "Sub Category Created Successfully";
                    exit;
                }else{
                    header('HTTP/1.1 422 Sub Category Create fail',true,422);
                    $data = ["name"=>"Sub Category Create fail"];
                    echo json_encode($data);
                    exit;
                }
            }
        }else{
            header('HTTP/1.1 422 Token Mis Match Error',true,422);
            echo "Token Mis Match Error";
            exit;
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
                SubCategory::where("id",$post->id)->update(["name"=>$post->name]);  
                    echo "Sub Category Edited Successfully";
                    exit;
            }
        }else{
            header('HTTP/1.1 422 Token Mis Match Error',true,422);
            echo "Token Mis Match Error";
            exit;
        }
    }

    public function delete($id){
        $con = SubCategory::destroy($id);
        if($con){
            Session::flash("delete_success","SubCategory Delete Successfully");
            Redirect::to("/admin/category/create");
        }else{
            Session::flash("delete_fail","SubCategory Deletion Fail");
            Redirect::to("/admin/category/create");
        }
    }
}