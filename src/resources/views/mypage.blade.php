@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
    <div class="user-wrap">
        <div class="user-group">
            <img class="user-group__icon" src="" alt="">
            <p class="user-group__name">ユーザーユーザー名ユーザー名ユーザー名ユーザー名</p>
        </div>
        <a class="user-wrap__profile" href="/mypage/profile">プロフィールを編集</a>
    </div>

    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" checked>出品した商品
        </label>
        <div class="tab-wrap__group">
            出品した商品の画像
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">購入した商品
        </label>

        <div class="tab-wrap__group">
            購入した商品の画像
        </div>
    </div>
@endsection