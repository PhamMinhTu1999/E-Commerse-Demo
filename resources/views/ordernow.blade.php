<?php
    $title = "Order now";
    $tax = 10;
    $delivery = 100000;
?>
@if(isset($exception))
    <script>
        alert("Address and payment method are required");
    </script>
@endif

@extends("master")
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <td>Products's Price</td>
                    <td>{{$price}}đ</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>{{$tax}}%</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>{{$delivery}}đ</td>
                </tr>
                <tr>
                    <th>Total Pay</th>
                    <th>{{$price * $tax / 100 + $delivery}}</th>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/orderPlace" method="POST">
                @csrf
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="address" placeholder="Address..."></textarea>
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method:</label><br>
                    <input type="radio" name="payment_method" value="card"><span>Visa/Mastercard</span><br>
                    <input type="radio" name="payment_method" value="paypal"><span>Paypal</span><br>
                    <input type="radio" name="payment_method" value="on_delivery"><span>On Delivery</span>
                </div>
                <input type="hidden" name="price" value="{{$price}}">
                <button type="submit" class="btn btn-success">Order Now</button>
            </form>
        </div>
    </div>
</div>
@endsection