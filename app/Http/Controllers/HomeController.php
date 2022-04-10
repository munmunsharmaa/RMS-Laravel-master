<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $items = Item::get();
        $item_data = Item::join("categories", "categories.id", "items.category_id")->get(["items.id", "items.item_name", "items.description", "categories.category_name", "items.unit_price", "items.status", "items.item_image"]);
        
        $authID = Auth::id();
        $auth = User::find($authID);

        $num_of_order_detail = count(OrderDetail::all());
        $num_of_order = count(Order::all());
        $num_of_item = count(Item::all());
        $num_of_table = count(Table::all());
        $num_of_categorie = count(Category::all());
        $num_of_employee = count(User::all());

        return view('welcome', compact("item_data", "items", "auth", "num_of_order_detail", "num_of_order", "num_of_item", "num_of_table", "num_of_categorie", "num_of_employee"));
    }

    public function ChangePassword(Request $request){
        $id = Auth::id();
        $user = User::findOrFail($id);
        $password_verified = Hash::check($request->current_password, $user->password);

        $request->validate([
            'current_password' => ["required", "min:8", "max:100"],
            'password' => ["required", "min:8", "max:100", "confirmed"],
            'password_confirmation' => ["required"]
        ]);

        if($password_verified){

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect("/")->with("changed_password_successfully", "Changed password successfully!");
        }else{
            return redirect("/")->with("fail_to_change_password", "Failed to change password!");
        }
    }
}