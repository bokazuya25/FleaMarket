@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('main')
    <h2 class="main-title">会員登録</h2>
    <form class="form-wrap" action="/register" method="post">
        @csrf
        <label class="form-wrap__label" for="email">メールアドレス
            <input class="form-wrap__input" type="email" id="email" name="email" value="{{ old('email') }}">
        </label>
        @error('email')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <label class="form-wrap__label" for="password">パスワード
            <input class="form-wrap__input" type="password" id="password" name="password">
        </label>
        @error('password')
            <div class="form-wrap__error">{{ $message }}</div>
        @enderror

        <button class="form-wrap__button" type="submit">会員登録する</button>
        <a class="form-wrap__link" href="/login">ログインはこちら</a>
    </form>
@endsection