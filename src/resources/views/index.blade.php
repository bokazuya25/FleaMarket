@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" checked>おすすめ
        </label>
        <div class="tab-wrap__group">
            おすすめの画像
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">マイリスト
        </label>

        @if (Auth::check())
            <div class="tab-wrap__group">
                マイリストの画像
            </div>
        @else
            <div class="tab-wrap__group">
                <a class="link-button" href="/register">会員登録</a>
                <span class="tab-wrap__group-text">及び</span>
                <a class="link-button" href="/login">ログイン</a>
                <span class="tab-warp__group-text">が必要です。</span>
            </div>
        @endif
    </div>
@endsection