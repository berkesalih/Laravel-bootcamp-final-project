<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'order';

    public static function getProductNameById($id)
    {
        $product = Product::where("id",$id)->first();
        return $product->name;
    }
    public static function getUserNameById($id)
    {
        $user = User::where("id",$id)->first();
        return $user->name;
    }
}
