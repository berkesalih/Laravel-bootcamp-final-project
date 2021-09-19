<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Saler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isNull;

class MainController extends Controller
{
    public function index(){
        $mostLiked = Product::orderBy("_like")->paginate(5);
        $mostViewed = Product::orderBy("view_count")->paginate(5);
        $mostDiscount = Product::orderBy("discount")->paginate(5);
        return view("front.index",compact("mostViewed","mostLiked","mostDiscount"));
    }
    public function GetLoginPage()
    {
        return view("public.login");
    }
    public function GetSignUpPage()
    {
        return view("public.signup");
    }
    public function SignUp(Request $request){
        $user = new User();
        $user->name = $request->firstName." ".$request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route("login");
    }
    public function Login(Request $request){
        $user = User::where("email",$request->email)->where("password",$request->pwd)->first();
        if (!$user)
        {
            return redirect()->route("login");
        }
        else
        {
            Auth::guard("user")->login($user);
            return redirect()->route("front_index");
        }
    }
    public function getSalersSignUp(){
        return view("public.Salers.signup");
    }
    public function salersSignUp(Request $request){
        $saler = new Saler();
        $saler->business_name = $request->businessName;
        $saler->mail = $request->email;
        $saler->password = $request->password;
        $saler->save();
        return redirect()->route("saler.login");
    }
    public function getSalersLogin(){
        return view("public.Salers.login");
    }
    public function salersLogin(Request $request){
//        dd($request->all());
        $saler = Saler::where("mail",$request->email)->where("password",$request->password)->first();
        if (!$saler)
        {
            return redirect()->route("saler_login");
        }
        else
        {
            Auth::guard("saler")->login($saler);
            if (Auth::guard("saler")->check())
            {
                return redirect()->route("saler_index");
            }
            else
            {
                return redirect()->route("saler_login");
            }
        }
    }
    public function getSalerIndex()
    {
        return view("admin.Saler.index");
    }
    public function AddToCart(Request $request)
    {
        if (Session::has("cart"))
        {
            $check = 0;
            $cart = Session::get("cart");
            foreach ($cart as $key => $value)
            {
                if ($key == $request->id)
                {

                    $cart[$key] = $value + $request->pieces;
                    Session::put("cart",$cart);
                    $check = 1;
                    break;
                }
            }
            if ($check == 0)
            {
                $cart[$request->id] = $request->pieces;
                Session::put("cart",$cart);
            }
        }
        else
        {
            $cart = [
                $request->id => $request->pieces
            ];
            Session::put("cart",$cart);
        }
        return redirect()->route("front_index");
    }
    public function cartPage()
    {
        $message = 0;
        if (Session::has("cart") && count(Session::get("cart"))>0)
        {
            $cart = Session::get("cart");

            return view("front.cart",compact("message","cart"));
        }
        else
        {
            $message = "Sepette herhangi bir ürün bulunmuyor.";
            return view("front.cart",compact("message"));
        }
    }
    public function deleteCart($id)
    {
        $cart = Session::get("cart");
        unset($cart[$id]);
        Session::put("cart",$cart);
        return redirect()->route("cartIndex");
    }
    public function ProductDetail($id)
    {
        $product = Product::where("id",$id)->first();
        $orders = Order::where("product_id",$product->id)->get();
        $comments = Product::getComments($id);
        return view("front.detail",compact("product","comments","orders"));

    }
    public function SuperAdminLoginPage()
    {
        return view("public.superAdminLogin");
    }
    public function SuperAdminLogin(Request $request)
    {
        $admin = Admin::where("username",$request->username)->where("password",$request->pwd)->first();
        if (!$admin)
        {
            return redirect()->route("superadmin.login");
        }
        else
        {
            Auth::guard("admin")->login($admin);
            if (Auth::guard("admin")->check())
            {
                return redirect()->route("superadmin.index");
            }
            else
            {
                return redirect()->route("superadmin.login");
            }
        }
    }
    public function getCategoryById($id)
    {
        $product = Product::where("sc_id",$id)->get();
        return view("front.category.category",compact("product"));

    }
}
