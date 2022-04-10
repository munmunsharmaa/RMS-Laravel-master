<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

        return redirect('/login')->with("register_success", "Registered successfully, please login to your account!");
    }
}
