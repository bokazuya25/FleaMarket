@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('main')
    <h2 class="main-title">プロフィール設定</h2>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <form class="form-wrap h-adr" action="" method="post">
        @csrf
        <div class="image-group">
            <img class="image-group__icon" src="" alt="">
            <label class="image-group__label" for="image">
                <input class="image-group__input" type="file" id="image">画像を選択する</input>
            </label>
        </div>

        <label class="form-wrap__label" for="name">ユーザー名
            <input class="form-wrap__input" type="text" id="name" name="name" value="{{ old('name') }}">
        </label>
        @error('name')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <span class="p-country-name" style="display: none;">Japan</span>
        <label class="form-wrap__label" for="postcode">郵便番号
            <input class="form-wrap__input p-postal-code" type="text" size="8" maxlength="8" id="postcode" name="postcode" value="{{ old('postcode') }}">
        </label>
        @error('postal-code')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label" for="address">住所
            <input class="form-wrap__input p-region p-locality p-street-address p-extended-address" type="text" id="address" name="address">
        </label>
        @error('address')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label" for="buillding">建物名
            <input class="form-wrap__input" type="text" id="buillding" name="buillding">
        </label>

        <button class="form-wrap__button" type="submit">更新する</button>
    </form>
@endsection