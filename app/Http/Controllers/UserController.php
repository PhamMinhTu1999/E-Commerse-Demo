<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function registerPage()
    {
        return view("register");
    }
    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect("/login");
    }
    function loginPage()
    {
        return view("login");
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
            return "Email and Password don't matched";
        }
    }
    function logout(Request $req)
    {
        $req->session()->forget("user");
        return redirect("/");
    }
}
