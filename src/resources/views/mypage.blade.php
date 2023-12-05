@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
    <div class="user-wrap">
        <div class="user-group">
            @if ($profile && $profile->img_url)
                <img class="user-group__icon" src="{{ $profile->img_url }}" alt="">
            @else
                <div class="user-group__icon--grey"></div>
            @endif
            <p class="user-group__name">{{ $user->name }}</p>
        </div>
        <a class="user-wrap__profile" href="/mypage/profile">プロフィールを編集</a>
    </div>

    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" checked>出品した商品
        </label>
        <div class="tab-wrap__group">
            @foreach ($sell_item as $item)
                @if ($item->img_url)
                    <div class="tab-wrap__content">
                        <a class="tab-wrap__content-link" href="/purchase/:item_id">
                            <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                        </a>
                    </div>
                @else
                    <div class="tab-wrap__content tab-wrap__content--grey">
                        <a class="tab-wrap__content-link" href="/purchase/:item_id">画像がありません</a>
                    </div>
                @endif

            @endforeach

            @for ($i = 0; $i < 10; $i++)
                <div class="tab-wrap__content dummy"></div>
            @endfor
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab">購入した商品
        </label>

        <div class="tab-wrap__group">
            @foreach ($sold_item as $item)
                @if ($item->img_url)
                    <div class="tab-wrap__content">
                        <a class="tab-wrap__content-link" href="/purchase/:item_id">
                            <img class="tab-wrap__content-image" src="{{ $item->img_url }}">
                        </a>
                    </div>
                @else
                    <div class="tab-wrap__content tab-wrap__content--grey">
                        <a class="tab-wrap__content-link" href="/purchase/:item_id">画像がありません</a>
                    </div>
                @endif
            @endforeach

            @for ($i = 0; $i < 10; $i++)
                <div class="tab-wrap__content dummy"></div>
            @endfor
        </div>
    </div>
@endsection