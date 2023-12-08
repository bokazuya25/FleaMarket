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
            @foreach ($items as $item)
                <div class="tab-wrap__content">
                    <a class="tab-wrap__content-link" href="/item/{{ $item->id }}">
                        <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                    </a>
                </div>
            @endforeach

            @for ($i = 0; $i < 3; $i++)
                <div class="tab-wrap__content dummy"></div>
            @endfor
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">マイリスト
        </label>

        @if (Auth::check())
            <div class="tab-wrap__group">
                @foreach ($likeItems as $likeItem)
                    <div class="tab-wrap__content">
                        <a class="tab-wrap__content-link" href="/item/{{ $item->id }}">
                            <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                        </a>
                    </div>
                @endforeach

                @for ($i = 0; $i < 5; $i++)
                    <div class="tab-wrap__content dummy"></div>
                @endfor
            </div>
        @else
            <div class="tab-wrap__group-link">
                <a class="link-button" href="/register">会員登録</a>
                <span class="tab-wrap__group-text">及び</span>
                <a class="link-button" href="/login">ログイン</a>
                <span class="tab-warp__group-text">が必要です。</span>
            </div>
        @endif

        <label class="tab-wrap__label redirect-label">
            <a class="redirect-link" href="/">他のおすすめを表示する</a>
        </label>

    </div>
@endsection