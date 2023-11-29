@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('main')
    <div class="section-wrap">
        <div class="section-inner__box">
            <img class="inner__box-image" src="" alt="商品画像">
        </div>
    </div>

    <div class="section-wrap">
        <div class="section-inner">
            <h2 class="inner__title inner__title--large">商品名</h2>
            <p class="inner__text">ブランド名</p>
            <p class="inner__text inner__text--medium">￥47,000(値段)</p>
            <div class="inner__unit">
                <div class="unit__icon">
                    <img class="unit__icon-image" src="{{ asset('img/star.svg') }}" alt="お気に入り">
                </div>
                <div class="unit__icon">
                    <img class="unit__icon-image" src="{{ asset('img/comment.svg') }}" alt="コメント">
                </div>
            </div>
            <a class="link-button" href="{{ Auth::user() ? '/purchase' : '/login' }}">購入する</a>
        </div>
        <div class="section-inner">
            <h3 class="inner__title">商品説明</h3>
            <p class="inner__text inner__description-text">
                カラー:グレー<br>
                <br>
                新品<br>
                商品の状態は良好です。傷もありません。<br>
                <br>
                購入後、即発送いたします。
        </div>
        <div class="section-inner">
            <h3 class="inner__title">商品の情報</h3>
            <div class="inner__group">
                <span class="group__title">カテゴリー</span>
                <span class="group__category">洋服</span>
                <span class="group__category">メンズ</span>
            </div>
            <div class="inner__group">
                <span class="group__title">商品の状態</span>
                <span class="group__text">良好</span>
            </div>
        </div>
    </div>
@endsection