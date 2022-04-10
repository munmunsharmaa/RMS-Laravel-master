<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function ItemHome(Request $request){
        $authID = Auth::id();
        $auth = User::find($authID);
        $categories = Category::get();

        $items = Item::join("categories", "categories.id", "items.category_id")->get(["items.id", "items.item_name", "items.description", "categories.category_name", "items.unit_price", "items.status", "items.item_image"]);

        return view("pages.item", compact("items", "auth", "categories"));
    }

    public function Create(ItemFormRequest $request){
        if($request -> hasFile("item_image") && $request -> file("item_image") -> isValid())
        {
            $file = time() . "." . $request -> file("item_image") -> getClientOriginalExtension();
            $request -> file("item_image") -> move(public_path('/item_images'), $file);
        }else{
            $file = "no-image.jpg";
        }

        $item = new Item();
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->unit_price = $request->unit_price;
        $item->status = $request->status;
        $item->item_image = $file;
        $item->save();

        return redirect("/item")->with("item_created", "Item created!");
    }

    public function View($id){
        $item = Item::findOrFail($id);

        return response()->json([
            'status'=>200,
            'item'=>$item
        ]);
    }

    public function Edit($id){
        $item = Item::findOrFail($id);

        return response()->json([
            'status'=>200,
            'item'=>$item
        ]);
    }

    public function Update(ItemFormRequest $req){
        $item = Item::findOrFail($req->id);
        $item -> item_name = $req -> item_name;
        $item -> description = $req -> description;
        $item -> category_id = $req -> category_id;
        $item -> unit_price = $req -> unit_price;
        $item -> status = $req -> status;

        if($req -> hasFile("item_image") && $req -> file("item_image") -> isValid())
        {
            $file = time() . "." . $req -> file("item_image") -> getClientOriginalExtension();
            $req -> file("item_image") -> move(public_path('/item_images'), $file);
        }else{
            $file = $item->item_image;
        }

        $item -> item_image = $file;
        $item -> save();

        return redirect("/item")->with("item_updated", "Item updated!");
    }

    public function Remove($id){
        $item = Item::findOrFail($id);

        return response()->json([
            'status'=>200,
            'item'=>$item
        ]);
    }

    public function Delete(Request $req){
        $item = Item::findOrFail($req->remove_id);
        $item -> delete();

        return redirect("/item")->with("item_deleted", "Item deleted!");
    }
}