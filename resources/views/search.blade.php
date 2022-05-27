<?php
    $title = "Search";
?>
@extends("master")
@section("content")
<div class="custom-product">
    <div class="trending-wrapper">
        <h3>Searched products</h3>
        @foreach ($products as $item)
           <a href="detail/{{$item['id']}}">
                <div class="trending-item">
                    <img class="trending-img" src="{{$item['gallery']}}" alt="{{$item['name']}}">
                    <h3 class="trending-text">{{$item['name']}}</h3>
                    <h5 class="trending-text">{{$item['description']}}</h5>
                </div>
           </a>
        @endforeach
    </div>
</div>
@endsection