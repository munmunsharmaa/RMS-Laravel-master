<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailFormRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function OrderDetailHome(Request $request){
        $authID = Auth::id();
        $auth = User::find($authID);
        $orders = Order::get();
        $items = Item::get();

        $order_details = OrderDetail::join("items", "items.id", "order_details.item_id")->get(["order_details.id", "order_details.order_id", "items.item_name", "order_details.qty_order"]);

        return view("pages.order_detail", compact("order_details", "auth", "orders", "items"));
    }

    public function Create(OrderDetailFormRequest $request){
        $check_order_detail = OrderDetail::where(["order_id" => $request->order_id, "item_id" => $request->item_id])->get();
        
        if(count($check_order_detail) == 0){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $request->order_id;
            $order_detail->item_id = $request->item_id;
            $order_detail->qty_order = $request->qty_order;
            $order_detail->save();
    
            return redirect("/order-detail")->with("order_detail_created", "Order detail created!");
        }else{
            return redirect("/order-detail")->with("order_detail_invalid", "Invalid Information, Please check your information again!");
        }
    }

    public function View($id){
        $order_detail = OrderDetail::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order_detail'=>$order_detail
        ]);
    }

    public function Edit($id){
        $order_detail = OrderDetail::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order_detail'=>$order_detail
        ]);
    }

    public function Update(OrderDetailFormRequest $req){
        $check_order_detail = OrderDetail::where(["order_id" => $req->order_id, "item_id" => $req->item_id])->get();
        
        if(count($check_order_detail) == 0){
            $order_detail = OrderDetail::findOrFail($req->id);
            $order_detail -> order_id = $req -> order_id;
            $order_detail -> item_id = $req -> item_id;
            $order_detail -> qty_order = $req -> qty_order;
            $order_detail -> save();

            return redirect("/order-detail")->with("order_detail_updated", "Order detail updated");
        }else{
            return redirect("/order-detail")->with("order_detail_invalid", "Invalid Information, Please check your information again!");
        }
    }

    public function Remove($id){
        $order_detail = OrderDetail::findOrFail($id);

        return response()->json([
            'status'=>200,
            'order_detail'=>$order_detail
        ]);
    }

    public function Delete(Request $req){
        $order_detail = OrderDetail::findOrFail($req->remove_id);
        $order_detail -> delete();

        return redirect("/order-detail")->with("order_detail_deleted", "Order detail deleted");
    }
}