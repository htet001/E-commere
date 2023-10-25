<?php

namespace App\Controllers;

use App\classes\Request;
use App\Models\Category;
use App\classes\CSRFToken;
use App\classes\Redirect;
use App\classes\Session;
use App\classes\UploadFile;
use App\Models\SubCategory;
use App\classes\ValidateRequest;
use App\Models\Product;

class ProductController extends BaseControllers
{
    public function home()
    {
        $pds = Product::all();
        list($products, $pages) = paginate(3, count($pds), new Product());
        $products = json_decode(json_encode($products));
        view("admin/product/home", compact('products', 'pages'));
    }

    public function create()
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        view("admin/product/create", compact('cats', 'subcats'));
    }

    public function store()
    {
        $post = Request::get('post');
        $file = Request::get('file');

        if (CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["required" => true, "unique" => "products", "minLength" => "3"],
                "number" => ["number" => true],
                "description" => ["required" => true, "minLength" => "5"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if ($validator->hasError()) {
                $errors = $validator->getError();
                $cats = Category::all();
                $subcats = SubCategory::all();
                view("admin/product/create", compact('cats', 'subcats', 'errors'));
            } else {
                if (!empty($file->file->name)) {
                    $uploadFile = new UploadFile();
                    if ($uploadFile->move($file)) {
                        $path = $uploadFile->getPath();

                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $path;

                        if ($product->save()) {
                            $products = Product::all();
                            Session::flash("product_insert_success", "Product Successfully Created");
                            Redirect::to("home", compact('products'));
                        } else {
                            $errors = ["Problem Insert Product to database"];
                            $cats = Category::all();
                            $subcats = SubCategory::all();
                            view("admin/product/create", compact('cats', 'subcats', 'errors'));
                        }
                    } else {
                        $errors = ["Please Check Picture size and type"];
                        $cats = Category::all();
                        $subcats = SubCategory::all();
                        view("admin/product/create", compact('cats', 'subcats', 'errors'));
                    }
                } else {
                    $errors = ["Please Support Image File"];
                    $cats = Category::all();
                    $subcats = SubCategory::all();
                    view("admin/product/create", compact('cats', 'subcats', 'errors'));
                }
            }
        } else {
            $errors = ["Token Mis Match Error"];
            $cats = Category::all();
            $subcats = SubCategory::all();
            view("admin/product/create", compact('cats', 'subcats', 'errors'));
        }
    }

    public function edit($id)
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        $product = Product::where("id", $id)->first();
        view("admin/product/edit", compact('product', 'cats', 'subcats'));
    }

    public function update($id)
    {
        $post = Request::get('post');
        $file = Request::get('file');
        $path = "";
        if (CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["required" => true, "unique" => "products", "minLength" => "3"],
                "number" => ["number" => true],
                "description" => ["required" => true, "minLength" => "5"]
            ];

            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if ($validator->hasError()) {
                $errors = $validator->getError();
                $product = Product::where("id", $id)->first();
                $cats = Category::all();
                $subcats = SubCategory::all();
                view("admin/product/edit", compact('cats', 'subcats', 'errors', 'product'));
            } else {
                if (empty($file->file->name)) {
                    $path = $post->old_image;
                } else {
                    $uploadFile = new UploadFile();
                    if ($uploadFile->move($file)) {
                        $path = $uploadFile->getPath();
                    } else {
                        $product = Product::where("id", $id)->first();
                        $cats = Category::all();
                        $subcats = SubCategory::all();
                        $errors = ["file_move_error" => "Can't Move Upload File"];
                        view("admin/product/edit", compact('cats', 'subcats', 'errors', 'product'));
                    }
                }
                $product = Product::where("id", $id)->first();
                $product->name = $post->name;
                $product->price = $post->price;
                $product->cat_id = $post->cat_id;
                $product->sub_cat_id = $post->sub_cat_id;
                $product->description = $post->description;
                $product->image = $path;

                if ($product->update()) {
                    Session::flash("product_insert_success", "Product Successfully Updated");
                    $pds = Product::all();
                    list($products, $pages) = paginate(3, count($pds), new Product());
                    Redirect::to("/admin/product/home", compact('product', 'pages'));
                } else {
                    $errors = ["Problem Update Product"];
                    $cats = Category::all();
                    $subcats = SubCategory::all();
                    $product = Product::where("id", $id)->first();
                    view("admin/product/edit", compact('cats', 'subcats', 'errors', 'product'));
                }
            }
        } else {
            Session::flash("Product Updated Fail", "Product Updated Fail");
            Redirect::to("admin/product/" . $id . "edit");
        }
    }

    public function delete($id)
    {
        $con = Product::destroy($id);
        if ($con) {
            Session::flash("product_insert_success", "Product Delete Successfully");
            Redirect::to("/admin/product/home");
        } else {
            Session::flash("product_insert_success", "Product Deletion Fail");
            Redirect::to("/admin/product/home");
        }
    }
}