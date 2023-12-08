@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('main')
    @if (session('success'))
        <div class="message-success" id="message">
            {{ session('success') }}
        </div>
    @endif
    <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#message").fadeIn(1000).delay(3000).fadeOut(1000);
        });
    </script>

    <h2 class="main-title">商品の出品</h2>
    <form class="form-wrap" action="/sell" method="post" enctype="multipart/form-data">
        @csrf
        <span class="form-wrap__label">商品画像
            <img class="preview-image" id="preview-image">
            <div class="image-group">
                <label class="image-group__label">
                    <input class="image-group__input" type="file" id="image" name="img_url" onchange="previewFile()">画像を選択する
                </label>
            </div>
        </span>
        <script>
            function previewFile() {
                var preview = document.getElementById('preview-image');
                var file    = document.querySelector('input[type=file]').files[0];
                var reader  = new FileReader();

                if (file) {
                    reader.onloadend = function () {
                        preview.src = reader.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.style.display = 'none';
                }
            }
        </script>

        <h3 class="form-wrap__title">商品の詳細</h3>
        <label class="form-wrap__label">カテゴリー
            <select class="form-wrap__select" name="category_id">
                <option selected disabled>--- 選択してください ---</option>
                @foreach ($selectCategories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label">商品の状態
            <select class="form-wrap__select" name="condition_id">
                <option selected disabled>--- 選択してください ---</option>
                @foreach ($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                @endforeach
            </select>
        </label>
        @error('password')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <h3 class="form-wrap__title">商品名と説明</h3>
        <label class="form-wrap__label">商品名
            <input class="form-wrap__input" type="text" name="name">
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label">商品の説明
            <textarea class="form-wrap__textarea" name="description" cols="30" rows="5"></textarea>
        </label>
        @error('password')
            <div class="form-wrapg__error">{{ $message }}</div>
        @enderror

        <h3 class="form-wrap__title">販売価格</h3>
        <label class="form-wrap__label">販売価格
            <div class="input-wrap">
                <input class="form-wrap__input input-price" type="text" name="price">
            </div>
        </label>
        @error('category')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
        <button class="form-wrap__button" type="submit">出品する</button>
    </form>
@endsection