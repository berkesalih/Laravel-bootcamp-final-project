<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
//    public function login(Request $request)
//    {
//        $email = $request->email;
//        $password = $request->password;
//
//        if (Auth::attempt(["email" => $email , "password" => $password]))
//        {
//            $user = Auth::user();
//            $success["token"] = $user->createToken("Login")->accessToken;
//            return response()->json(
//                [
//                    "success" => $success["token"]
//                ],200
//            );
//        }
//        else
//        {
//            return response()->json(["olmadı"=>"kanka"],401);
//        }
//    }
    public function allProduct()
    {
        return Product::all();
    }
    public function getProductByID($id)
    {
        return Product::find($id);
    }
    public function getMostLikeProducts()
    {
        return Product::orderBy("_like","DESC")->take(2)->get();
    }
    public function getMostViewedProducts()
    {
        return Product::orderBy("view_count","DESC")->take(2)->get();
    }
    public function getMostDiscount()
    {
        return Product::orderBy("discount","DESC")->take(2)->get();
    }
    public function getCommentById($id)
    {
        return Comment::where("product_id",$id)->take(2)->get();
    }
    public function getAllCategories()
    {
        return Category::all();
    }
    public function getAllSubcategories()
    {
        return SubCategory::all();
    }
    public function AddProduct(Request $request)
    {
        $data = request()->all();
        Product::create($data);
        return response()->json(["oldu"]);
    }
}
