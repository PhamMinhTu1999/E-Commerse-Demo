<?php
    $title = "Cart List";
?>
@extends("master")
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <h2>Cart's Products</h2>
        <h3>Total Price: {{$total_price}}đ</h3>
        <a href="orderNow" class="btn btn-success">Order Now</a>
        @foreach ($products as $item)
            <div class="row list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}" alt="{{$item->name}}">
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <h3 class="trending-text">{{$item->name}}</h3>
                        <h5 class="trending-text">{{$item->description}}</h5>
                    </a>
                </div>
                <div class="col-sm-3">
                        <h3 class="trending-text">{{$item->price}}đ</h3>
                </div>
                <div class="col-sm-3">
                    <form action="/removeCart" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{$item->cart_id}}">
                        <button type="submit" class="btn btn-warning">Remove from Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection