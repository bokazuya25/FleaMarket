@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" checked>おすすめ
        </label>
        <div class="tab-wrap__content">
            おすすめの画像
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">マイリスト
        </label>
        <div class="tab-wrap__content">
            マイリストの画像
        </div>
</div>
@endsection