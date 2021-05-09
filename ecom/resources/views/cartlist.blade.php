@extends('master')
@section("content")
<?php
use Illuminate\Support\Facades\Session;
?>
<div class="custom-product">
    @if(Session::has('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
            @if(count($products))
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}">
                    </a>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <h2>{{$item->name}}</h2>
                        <h5>{{$item->description}}</h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                </div>
            </div>
            @endforeach
            @else
            <h2>Cart is an Empty.</h2>
            @endif
        </div>
        <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

    </div>
</div>
@endsection