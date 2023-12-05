@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('main')
    <div class="message-success" id="message">
        {{ session('success') }}
    </div>
    <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#message").fadeIn(1000).delay(3000).fadeOut(1000);
        });
    </script>

    <div class="section-wrap">
        <div class="section-group">
            <div class="image-content">
                <img class="image-content__image" src="" alt="商品画像">
            </div>
            <div class="item-content">
                <h2 class="item-content__title">{{ $item->name }}</h2>
                <p class="item-content__price">￥{{ number_format($item->price) }}</p>
            </div>
        </div>
        <div class="payment-group">
            <div class="header-content">
                <h3 class="header-content__title">支払方法</h3>
                <a class="link-button" href="/purchase/payment/{{ $item->id }}">変更する</a>
            </div>
            <p class="payment-group__text"></p>
        </div>
        <div class="address-group">
            <div class="header-content">
                <h3 class="header-content__title">配送先</h3>
                <a class="link-button" href="/purchase/address/{{ $item->id }}">変更する</a>
            </div>
            <div class="address-content">
                <p class="address-content__text">〒{{ substr($profile->postcode, 0, 3) . '-' . substr($profile->postcode, 3) }}</p>
                <p class="address-content__text">{{ $profile->address }} <span>{{ $profile->building }}</span></p>
            </div>

        </div>
    </div>

    <div class="confirm-wrap">
        <div class="confirm-group">
            <div class="confirm-content confirm-content__price">
                <p class="confirm-content__title">商品代金</p>
                <p class="confirm-content__text">￥{{ number_format($item->price) }}</p>
            </div>
            <div class="confirm-content confirm-content__total">
                <p class="confirm-content__title">支払い金額</p>
                <p class="confirm-content__text">￥{{ number_format($item->price) }}</p>
            </div>
            <div class="confirm-content confirm-content__payment">
                <p class="confirm-content__title">支払方法</p>
                <p class="confirm-content__text">コンビニ払い</p>
            </div>
        </div>
        <form class="form" action="/purchase/decide/{item_id}" method="get">
            <button class="submit-button">購入する</button>
        </form>
    </div>
@endsection
