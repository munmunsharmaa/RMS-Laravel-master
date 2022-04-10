<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryHome(Request $request){
        $authID = Auth::id();
        $auth = User::find($authID);

        $categories = Category::get();

        return view("pages.category", compact("categories", "auth"));
    }

    public function Create(CategoryFormRequest $request){
        if($request -> hasFile("category_image") && $request -> file("category_image") -> isValid())
        {
            $file = time() . "." . $request -> file("category_image") -> getClientOriginalExtension();
            $request -> file("category_image") -> move(public_path('/category_images'), $file);
        }else{
            $file = "no-image.jpg";
        }

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->category_image = $file;
        $category->save();

        return redirect("/category")->with("category_created", "Category created!");
    }

    public function View($id){
        $category = Category::findOrFail($id);

        return response()->json([
            'status'=>200,
            'category'=>$category
        ]);
    }

    public function Edit($id){
        $category = Category::findOrFail($id);

        return response()->json([
            'status'=>200,
            'category'=>$category
        ]);
    }

    public function Update(CategoryFormRequest $req){
        $category = Category::findOrFail($req->id);
        $category -> category_name = $req -> category_name;
        $category -> status = $req -> status;

        if($req -> hasFile("category_image") && $req -> file("category_image") -> isValid())
        {
            $file = time() . "." . $req -> file("category_image") -> getClientOriginalExtension();
            $req -> file("category_image") -> move(public_path('/category_images'), $file);
        }else{
            $file = $category->category_image;
        }

        $category -> category_image = $file;
        $category -> save();

        return redirect("/category")->with("category_updated", "Category updated!");
    }

    public function Remove($id){
        $category = Category::findOrFail($id);

        return response()->json([
            'status'=>200,
            'category'=>$category
        ]);
    }

    public function Delete(Request $req){
        $category = Category::findOrFail($req->remove_id);
        $category -> delete();

        return redirect("/category")->with("category_deleted", "Category deleted!");
    }
}