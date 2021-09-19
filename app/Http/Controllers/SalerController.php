<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Saler;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:saler');
    }

    public function AddPage(){
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view("admin.Saler.addProduct",compact("category","subcategory"));
    }
    public function SaveProduct(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->props = $request->properties;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->rating = 0;
        $product->sc_id = $request->subcategory;
        $product->saler_id = Auth::guard("saler")->user()->id;
        $product->save();
        return redirect()->route("saler_myProducts");
    }
    public function MyProducts()
    {
        $saler_id = Auth::guard("saler")->user()->id;
        $myProducts = Product::where("saler_id",$saler_id)->get();
        return view("admin.Products.myProducts",compact("myProducts"));
    }
    public function Detail($id)
    {
        $detail = Product::where("id",$id)->get();
        return view("admin.Products.productDetail",compact("detail"));
    }
    public function UpdatePage($id){
        $product = Product::where("id",$id)->first();
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view("admin.Products.productUpdate",compact("product","category","subcategory"));
    }
    public function UpdateProduct(Request $request)
    {
        $product = Product::where("id",$request->id)->first();
        $product->name = $request->name;
        $product->props = $request->properties;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->rating = 0;
        $product->sc_id = $request->subcategory;
        $product->saler_id = Auth::guard("saler")->user()->id;
        $product->save();
        return redirect()->route("saler_myProducts");

    }
    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("saler_myProducts");
    }
    public function logout()
    {
        Auth::guard("saler")->logout();
        return redirect()->route("saler_login");
    }
    public function UncompletedOrders()
    {
        $order = Order::where("saler_id",Auth::guard("saler")->user()->id)->where("status","s")->get();
        return view("admin.Saler.uncomletedOrders",compact("order"));
    }
    public function CancelOrder($id)
    {
        $order = Order::where("id",$id)->first();
        $order->status = "c";
        $order->save();
        $product = Product::where("id",$order->product_id)->first();
        $product->stock += $order->pieces;
        $product->save();
        return redirect()->route("saler.uncompleteOrders");
    }
    public function CompleteOrder($id)
    {
        $order = Order::where("id",$id)->first();
        $order->status = "t";
        $order->save();
        return redirect()->route("saler.uncompleteOrders");
    }
    public function CompletedOrders()
    {
        $order = Order::where("saler_id",Auth::guard("saler")->user()->id)->where("status","t")->get();
        return view("admin.Saler.uncomletedOrders",compact("order"));
    }
    public function CanceledOrders()
    {
        $order = Order::where("saler_id",Auth::guard("saler")->user()->id)->where("status","c")->get();
        return view("admin.Saler.uncomletedOrders",compact("order"));
    }
}
