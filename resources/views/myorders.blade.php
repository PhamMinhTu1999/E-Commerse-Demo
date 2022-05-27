<?php
    $title = "My Orders";
?>@extends("master")
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <h2>My Orders</h2>
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
                    <h3 class="trending-text">Address: {{$item->address}}</h3>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                    <h3 class="trending-text">Status: {{$item->status}}</h3>
                    <h3 class="trending-text">Payment Method: {{$item->payment_method}}</h3>
                    <h3 class="trending-text">Payment Status: {{$item->payment_status}}</h3>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection