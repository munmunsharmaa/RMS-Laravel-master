<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function OrderHome(Request $request){
        $authID = Auth::id();
        $auth = User::find($authID);
        $employees = User::get();
        $tables = Table::get();

        $orders = Order::join("users", "users.id", "orders.employee_id")->join("tables", "tables.id", "orders.table_id")->get(["orders.id", "users.name", "orders.order_date", "orders.status", "orders.print_qty", "tables.table_name"]);

        return view("pages.order", compact("orders", "auth", "employees", "tables"));
    }

    public function Create(OrderFormRequest $request){
        $order = new Order();
        $order->employee_id = Auth::id();
        $order->order_date = $request->order_date;
        $order->status = $request->status;
        $order->print_qty = $request->print_qty;
        $order->table_id = $request->table_id;
        $order->save();

        return redirect("/order")->with("order_created", "Order created!");
    }

    public function View($id){
        $order = Order::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order'=>$order
        ]);
    }

    public function Edit($id){
        $order = Order::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order'=>$order
        ]);
    }

    public function Update(OrderFormRequest $req){
        $order = Order::findOrFail($req->id);
        $order -> employee_id = $req -> employee_id;

        if(!empty($req -> order_date)){
            $order_date = $req -> order_date;
        }else{
            $order_date = $order->order_date;
        }

        $order -> order_date = $order_date;
        $order -> status = $req -> status;
        $order -> print_qty = $req -> print_qty;
        $order -> table_id = $req -> table_id;
        $order -> save();

        return redirect("/order")->with("order_updated", "Order updated!");
    }

    public function Remove($id){
        $order = Order::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order'=>$order
        ]);
    }

    public function Delete(Request $req){
        $order = Order::findOrFail($req->remove_id);
        $order -> delete();

        return redirect("/order")->with("order_deleted", "Order deleted!");
    }
}