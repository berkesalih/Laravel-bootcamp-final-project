<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:user");
    }
    public function completeToOrder()
    {
        if (Session::has("cart") && count(Session::get("cart"))>0)
        {
            $cart = Session::get("cart");
            foreach ($cart as $key => $value)
            {
                $product = Product::where("id",$key)->first();
                $order = new Order();
                $order->saler_id = $product->saler_id;
                $order->user_id = Auth::guard("user")->user()->id;
                $order->product_id = $product->id;
                $order->pieces = $value;
                $order->price = getProductRealPrice($product->id)*$value;
                $order->save();
                $product->stock -= $value;
                $product->save();
                Session::forget("cart");
            }
            return redirect()->route("front_index");
        }
        else
        {
            return redirect()->route("front_index");
        }
    }
    public function logout()
    {
        Auth::guard("user")->logout();
        return redirect()->route("login");
    }
    public function AddComment(Request $request)
    {
        $comment = new Comment();
        $comment->description = $request->description;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::guard("user")->user()->id;
        $comment->save();
        return redirect()->route("product.detail",$request->product_id);
    }
}
