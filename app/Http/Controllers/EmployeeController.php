<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function EmployeeHome(Request $request){
        $authID = Auth::id();
        $auth = User::find($authID);

        $users = User::get();

        return view("pages.employee", compact("users", "auth"));
    }

    public function Create(EmployeeFormRequest $req){

        if($req -> hasFile("photo") && $req -> file("photo") -> isValid())
        {
            $file = time() . "." . $req -> file("photo") -> getClientOriginalExtension();
            $req -> file("photo") -> move(public_path('/user_photos'), $file);
        }else{
            $file = "no-image.jpg";
        }

        $user = new User();
        $user -> name = $req -> name;
        $user -> email = $req -> email;
        $user -> user_type = $req -> user_type;
        $user -> role = $req -> role;
        $user -> company = $req -> company;
        $user -> job_title = $req -> job_title;
        $user -> phone = $req -> phone;
        $user -> home_phone = $req -> home_phone;
        $user -> address = $req -> address;
        $user -> city = $req -> city;
        $user -> state_province = $req -> state_province;
        $user -> zip_postal_code = $req -> zip_postal_code;
        $user -> country_region = $req -> country_region;
        $user -> photo = $file;
        $user -> password = Hash::make($req -> password);
        $user -> save();

        return redirect("/employee")->with("employee_created", "Employee created!");
    }

    public function View($id){
        $user = User::findOrFail($id);

        return response()->json([
            'status'=>200,
            'user'=>$user
        ]);
    }

    public function Edit($id){
        $user = User::findOrFail($id);

        return response()->json([
            'status'=>200,
            'user'=>$user
        ]);
    }

    public function Update(Request $req){
        $user = User::findOrFail($req->id);
        $user -> name = $req -> name;
        $user -> email = $req -> email;
        $user -> user_type = $req -> user_type;
        $user -> role = $req -> role;
        $user -> company = $req -> company;
        $user -> job_title = $req -> job_title;
        $user -> phone = $req -> phone;
        $user -> home_phone = $req -> home_phone;
        $user -> address = $req -> address;
        $user -> city = $req -> city;
        $user -> state_province = $req -> state_province;
        $user -> zip_postal_code = $req -> zip_postal_code;
        $user -> country_region = $req -> country_region;

        if($req -> hasFile("photo") && $req -> file("photo") -> isValid())
        {
            $file = time() . "." . $req -> file("photo") -> getClientOriginalExtension();
            $req -> file("photo") -> move(public_path('/user_photos'), $file);
        }else{
            $file = $user->photo;
        }

        $user -> photo = $file;
        $user -> save();

        return redirect("/employee")->with("employee_updated", "Employee updated!");
    }

    public function Remove($id){
        $user = User::findOrFail($id);

        return response()->json([
            'status'=>200,
            'user'=>$user
        ]);
    }

    public function Delete(Request $req){
        $user = User::findOrFail($req->remove_id);
        $user -> delete();

        return redirect("/employee")->with("employee_deleted", "Employee deleted!");
    }
}