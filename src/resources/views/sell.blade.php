@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('main')
    <h2 class="main-title">商品の出品</h2>
    <form class="form-wrap" action="/login" method="post">
        @csrf
        <label class="form-wrap__label" for="image">商品画像
            <div class="image-group">
                <label class="image-group__label" for="image">
                    <input class="image-group__input" type="file" id="image" name="image">画像を選択する
                </label>
            </div>
        </label>

        <h3 class="form-wrap__title">商品の詳細</h3>
        <label class="form-wrap__label" for="category">カテゴリー
            <input class="form-wrap__input" type="text" id="category" name="category" value="{{ old('category') }}">
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label" for="condition">商品の状態
            <input class="form-wrap__input" type="text" id="condition" name="condition" value="{{ old('condition') }}">
        </label>
        @error('password')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <h3 class="form-wrap__title">商品名と説明</h3>
        <label class="form-wrap__label" for="item">商品名
            <input class="form-wrap__input" type="text" id="item" name="item" value="{{ old('item') }}">
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label" for="explanation">商品の説明
            <textarea class="form-wrap__textarea" id="explanation" name="explanation" cols="30" rows="5">{{ old('explanation') }}</textarea>
        </label>
        @error('password')
            <div class="form-wrapg__error">{{ $message }}</div>
        @enderror

        <h3 class="form-wrap__title">販売価格</h3>
        <label class="form-wrap__label" for="price">販売価格
            <input class="form-wrap__input" type="text" id="price" name="price" value="￥{{ old('price') }}">
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <button class="form-wrap__button" type="submit">出品する</button>
    </form>
@endsection