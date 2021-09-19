<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SubCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'subcategory';

    public static function getCategoryNameByID($id)
    {
        $category = Category::where("id",$id)->first();
        return $category->name;
    }
    public static function getCategoryID($id)
    {
        $subcategory = SubCategory::where("id",$id)->first();
        $value = Category::where("id",$subcategory->category_id)->first();
        return $value->id;
    }
    public static function getSubCategoryNameByID($id)
    {
        $subcategory = SubCategory::where("id",$id)->first();
        return $subcategory->name;
    }
}
