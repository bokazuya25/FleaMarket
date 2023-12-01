@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('main')
    <div class="section-wrap">
        <div class="section-group">
            <div class="image-content">
                <img class="image-content__image" src="" alt="商品画像">
            </div>
            <div class="item-content">
                <h2 class="item-content__title">商品名</h2>
                <p class="item-content__price">￥47,000</p>
            </div>
        </div>
        <div class="payment-group">
            <div class="header-content">
                <h3 class="header-content__title">支払方法</h3>
                <a class="link-button" href="">変更する</a>
            </div>
            <p class="group__text">コンビニ払い</p>
        </div>
        <div class="address-group">
            <div class="header-content">
                <h3 class="header-content__title">配送先</h3>
                <a class="link-button" href="/purchase/address">変更する</a>
            </div>
            <p class="group__text">〇〇県〇〇市△△1丁目-1-1</p>
        </div>
    </div>

    <div class="confirm-wrap">
        <div class="confirm-group">
            <div class="confirm-content confirm-content__price">
                <p class="confirm-content__title">商品代金</p>
                <p class="confirm-content__text">￥47,000</p>
            </div>
            <div class="confirm-content confirm-content__total">
                <p class="confirm-content__title">支払い金額</p>
                <p class="confirm-content__text">￥47,000</p>
            </div>
            <div class="confirm-content confirm-content__payment">
                <p class="confirm-content__title">支払方法</p>
                <p class="confirm-content__text">コンビニ払い</p>
            </div>
        </div>
        <button class="submit-button">購入する</button>
    </div>
@endsection