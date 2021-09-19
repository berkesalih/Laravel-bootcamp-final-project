<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'product';
    protected $fillable = ["name","props","discount","stock","saler_id","sc_id","price"];

    public static function getComments($id)
    {
        $comment = Comment::where("product_id",$id)->get();
        return $comment;
    }

}
