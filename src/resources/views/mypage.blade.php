@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
    @if (session('success'))
        <div class="message-success" id="message">
            {{ session('success') }}
        </div>
        <script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#message").fadeIn(1000).delay(3000).fadeOut(1000);
            });
        </script>
    @endif
    <div class="user-wrap">
        <div class="user-group">
            <img class="user-group__icon" src="{{ $user->img_url }}" alt="">
            <p class="user-group__name">{{ $user->name }}</p>
        </div>
        <a class="user-wrap__profile" href="/mypage/profile">プロフィールを編集</a>
    </div>

    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" checked>出品した商品
        </label>
        <div class="tab-wrap__group">
            @foreach ($sellItem as $item)
                <div class="tab-wrap__content">
                    <a class="tab-wrap__content-link" href="/item/{{ $item->id }}">
                        <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                    </a>
                </div>
            @endforeach

            @for ($i = 0; $i < 10; $i++)
                <div class="tab-wrap__content dummy"></div>
            @endfor
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">購入した商品
        </label>

        <div class="tab-wrap__group">
            @foreach ($soldItem as $item)
                <div class="tab-wrap__content">
                    <a class="tab-wrap__content-link" href="/item/{{ $item->id }}">
                        <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                    </a>
                </div>
            @endforeach

            @for ($i = 0; $i < 10; $i++)
                <div class="tab-wrap__content dummy"></div>
            @endfor
        </div>
    </div>
@endsection