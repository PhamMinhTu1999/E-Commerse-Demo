<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function registerPage()
    {
        if (Session::get("exception") == 1)
            {
                session()->forget("exception");
                return view("register",["exception"=>1]);
            }
        else
        {
            return view("register");
        }
    }
    function register(Request $req)
    {
        if ($req->name == null || $req->email == null || $req->password == null)
        {
            session()->put("exception", 1);
            return redirect("/register");
        }
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect("/login");
    }
    function loginPage()
    {
        if (Session::get("exception") == 1)
            {
                session()->forget("exception");
                return view("login",["exception"=>1]);
            }
        else
        {
            return view("login");
        }
    }
    function login(Request $req)
    {
        $user = User::where(["email"=>$req->email])->first();
        if($user && Hash::check($req->password, $user->password))
        {
            $req->session()->put("user",$user);
            return redirect("/");
        }
        else
        {
            session()->put("exception", 1);
            return redirect("/login");
        }
    }
    function logout(Request $req)
    {
        session()->forget("user");
        return redirect("/");
    }
}
