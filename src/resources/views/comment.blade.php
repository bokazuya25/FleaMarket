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
                    <a href="/item">
                        <img class="item-icon__image" src="{{ asset('img/comment.svg') }}" alt="コメント">
                    </a>
                </div>
            </div>
        </div>
        <div class="comment-group">
            <div class="comment-content">
                <div class="user-area">
                    <img class="user-area__image" src="">
                    <span class="user-area__name">名前</span>
                </div>
                <p class="comment-content__text">てすと</p>
            </div>
            <div class="comment-content">
                <div class="user-area">
                    <img class="user-area__image" src="">
                    <span class="user-area__name">名前</span>
                </div>
                <p class="comment-content__text">てすと</p>
            </div>
            <div class="comment-content">
                <div class="user-area">
                    <img class="user-area__image" src="">
                    <span class="user-area__name">名前</span>
                </div>
                <p class="comment-content__text">てすと</p>
            </div>
        </div>
        <form class="form-group">
            <label class="form-group__label" for="comment">商品へのコメント
                <textarea class="form-group__text" name="comment" id="comment" rows="10"></textarea>
            </label>
            <button class="submit-button" type="submit">コメントを送信する</button>
        </form>
    </div>
@endsection