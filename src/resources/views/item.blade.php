@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('main')
    <div class="image-wrap">
        <div class="image-group">
            <img class="image-group__image" src="" alt="商品画像">
        </div>
    </div>

    <div class="detail-wrap">
        <div class="item-group">
            <h2 class="item-group__title">商品名</h2>
            <span class="item-group__brand">ブランド名</span>
            <p class="item-group__price">￥47,000(値段)</p>
            <div class="item-unit">
                <div class="item-icon">
                    <img class="item-icon__image" src="{{ asset('img/star.svg') }}" alt="お気に入り">
                </div>
                <div class="item__icon">
                    <a href="/item/comment">
                        <img class="item-icon__image" src="{{ asset('img/comment.svg') }}" alt="コメント">
                    </a>
                </div>
            </div>
            <a class="link-button" href="{{ Auth::user() ? '/purchase' : '/login' }}">購入する</a>
        </div>
        <div class="explanation-group">
            <h3 class="explanation-group__title">商品説明</h3>
            <p class="explanation-group__text">
                カラー:グレー<br>
                <br>
                新品<br>
                商品の状態は良好です。傷もありません。<br>
                <br>
                購入後、即発送いたします。
        </div>
        <div class="information-group">
            <h3 class="information-group__title">商品の情報</h3>
            <div class="information-content">
                <span class="information-content__title">カテゴリー</span>
                <span class="information-content__category">洋服</span>
                <span class="information-content__category">メンズ</span>
            </div>
            <div class="information-content">
                <span class="information-content__title">商品の状態</span>
                <span class="information-content__text">良好</span>
            </div>
        </div>
    </div>
@endsection