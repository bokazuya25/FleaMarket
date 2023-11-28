@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('main')
    <h2 class="content__title">会員登録</h2>
    <form class="content__form" action="" method="">
        <label class="form__label" for="emial">メールアドレス
            <input class="form__label-input" type="email" id="email" name="email">
        </label>
        <label class="form__label" for="password">パスワード
            <input class="form__label-input" type="password" id="password" name="password">
        </label>
        <button class="form__button" type="submit">会員登録する</button>
        <a class="form__item-link" href="/login">ログインはこちら</a>
    </form>
@endsection