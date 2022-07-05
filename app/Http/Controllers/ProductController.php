<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class ProductController extends Controller
{
    function home()
    {
        $data = Product::all();
        if (Session::get("order") == 1)
            {
                session()->forget("order");
                return view("product",["products"=>$data,"order"=>1]);
            }
        else
        {   
            return view("product",["products"=>$data]);
        }
        
    }
    function detail($id)
    {
        $data = Product::where("id", $id)->first();
        return view("detail",["product"=>$data]);
    }
    function search(Request $req)
    {
        $data = Product::where("name","like","%". $req->input("query")."%")->get();
        return view("search",["products"=>$data]);
    }

    function cartList()
    {
        $userID = Session::get("user")["id"];
        $products = DB::table("cart")
            ->join("products","cart.product_id","=","products.id")
            ->where("cart.user_id",$userID)
            ->select("products.*","cart.id as cart_id")
            ->get();
        $totalPrice = DB::table("cart")
            ->join("products","cart.product_id","=","products.id")
            ->where("cart.user_id",$userID)
            ->sum("products.price");
        return view("cartlist",["products"=>$products],["total_price"=>$totalPrice]);
    }
    static function cartItem()
    {
        $userID = Session::get("user")["id"];
        return Cart::where("user_id",$userID)->count();
    }
    function addCart(Request $req)
    {
        if($req->session()->has("user"))
        {
            $cart = new Cart;
            $cart->user_id = $req->session()->get("user")["id"];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect("/cartList");
        }
        else
        {
            return redirect("/login");
        }
    }
    function removeCart(Request $req)
    {
        Cart::destroy($req->cart_id);
        return redirect("/cartList");
    }

    function orderNow()
    {
        $userID = Session::get("user")["id"];
        $totalPrice = DB::table("cart")
            ->join("products","cart.product_id","=","products.id")
            ->where("cart.user_id",$userID)
            ->sum("products.price");
            if (Session::get("exception") == 1)
            {
                session()->forget("exception");
                return view("orderNow",["price"=>$totalPrice, "exception"=>1]);
            }
            else
            {
                return view("orderNow",["price"=>$totalPrice]);
            }
        
    }
    function orderPlace(Request $req)
    {
        if ($req->payment_method == null || $req->address == null)
        {
            session()->put("exception", 1);
            return redirect("/orderNow");
        }
        $userID = Session::get("user")["id"];
        $allCart = Cart::where("user_id",$userID)->get();
        foreach($allCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart["product_id"];
            $order->user_id = $cart["user_id"];
            $order->status = "pending";
            $order->payment_method = $req->payment_method;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
        }
        Cart::where("user_id",$userID)->delete();
        session()->put("order", 1);
        return redirect("/");
    }
    function myOrders()
    {
        $userID = Session::get("user")["id"];
        $products = DB::table("orders")
            ->join("products","orders.product_id","=","products.id")
            ->where("orders.user_id",$userID)
            ->get();
        return view("myOrders",["products"=>$products]);
    }
}
