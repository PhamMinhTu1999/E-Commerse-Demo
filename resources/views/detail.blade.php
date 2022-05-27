<?php
    $title = $product['name'];
?>
@extends("master")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}" alt="{{$product['name']}}">
        </div>
        <h2>{{$product['name']}}</h2>
        <h3>Price: {{$product['price']}}đ</h3>
        <h4>{{$product['description']}}</h4>
        <br><br>
        <form action="/addCart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product['id']}}">
            <button type="submit" class="btn btn-success">Add to Cart</button>
        </form>
        <a href="/" class="btn btn-primary">Go Back</a>
    </div>
</div>
@endsection