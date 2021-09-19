<?php

use App\Models\Product;

function getProductRealPrice($id)
{
    $product = Product::where("id",$id)->first();
    return $product->price - ($product->price * $product->discount)/100;
}
function getProduct($id)
{
    $product = Product::where("id",$id)->first();
    return $product;
}
function getDiscount($id)
{
    $product = Product::where("id",$id)->first();
    return ($product->price * $product->discount)/100;
}
