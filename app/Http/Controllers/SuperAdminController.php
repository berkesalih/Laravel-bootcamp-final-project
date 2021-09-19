<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view("superAdmin.index");
    }
    public function AddCategoryPage()
    {
        return view("superAdmin.category.addCategory");
    }
    public function AddCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route("superadmin.index");
    }
    public function AddSubCategoryPage()
    {
        $category = Category::all();
        return view("superAdmin.subcategory.AddSubCategory",compact("category"));
    }
    public function AddSubCategory (Request $request)
    {
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->route("superadmin.index");
    }
    public function CategoryList()
    {
        $category = Category::all();
        return view("superAdmin.category.categoryList",compact("category"));
    }
    public function SubCategoryList()
    {
        $subcategory = SubCategory::all();
        return view("superAdmin.subcategory.subcategoryList",compact("subcategory"));
    }
    public function DeleteCategory($id)
    {
        Category::destroy($id);
        return redirect()->route("superadmin.category.list");
    }
    public function EditCategory($id)
    {
        $category = Category::where("id",$id)->first();
        return view("superAdmin.category.categoryEdit",compact("category"));

    }
    public function UpdateCategory(Request $request)
    {
        $category = Category::where("id",$request->id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route("superadmin.category.list");
    }
    public function DeleteSubCategory($id)
    {
        SubCategory::destroy($id);
        return redirect()->route("superadmin.subcategory.list");
    }
    public function EditSubCategory($id)
    {
        $subcategory = SubCategory::where("id",$id)->first();
        $category = Category::all();
        return view("superAdmin.subcategory.subCategoryEdit",compact("subcategory","category"));

    }
    public function UpdateSubCategory(Request $request)
    {
        $subcategory = SubCategory::where("id",$request->id)->first();
        $subcategory->name = $request->name;
        $subcategory->save();
        return redirect()->route("superadmin.subcategory.list");
    }
    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("front_index");
    }
}
