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
            <img class="user-group__icon" src="{{ $user->img_url }}">
            <p class="user-group__name">{{ $user->name }}</p>
        </div>
        <a class="user-wrap__profile" href="/mypage/profile">プロフィールを編集</a>
    </div>

    <div class="tab-wrap">
        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" value="sell_items">出品した商品
        </label>
        <div class="tab-wrap__group">
            @foreach ($sellItem as $item)
                <div class="tab-wrap__content">
                    @if ($item->soldToUsers()->exists())
                        <div class="sold-out__mark">SOLD OUT</div>
                    @endif
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
            <input class="tab-wrap__input" type="radio" value="bought_items" name="tab">購入した商品
        </label>
        <div class="tab-wrap__group">
            @foreach ($soldItem as $item)
                <div class="tab-wrap__content">
                    <div class="sold-out__mark">SOLD OUT</div>
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
            <input class="tab-wrap__input" type="radio" name="tab" value="user_list" checked>ユーザー一覧
        </label>
        <div class="tab-wrap__group users-table__group">
            <table class="users__table">
                <tr class="table__row">
                    <th class="table__header">ID</th>
                    <th class="table__header">Name</th>
                    <th class="table__header">Email</th>
                    <th class="table__header"></th>
                </tr>
                @foreach ($users as $user)
                    <tr class="table__row">
                        <td class="table__data data__id">{{ $user->id }}</td>
                        <td class="table__data data__name">{{ $user->name }}</td>
                        <td class="table__data data__email">{{ $user->email }}</td>
                        <td class="table__data data__delete">
                            <form class="form__wrap" action="/admin/mypage/delete-user" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button class="submit-button" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links('vendor/pagination/paginate') }}
        </div>

        <label class="tab-wrap__label">
            <input class="tab-wrap__input" type="radio" name="tab" value="user_list" checked>スタッフ
        </label>
        <div class="tab-wrap__group users-table__group">
            <table class="users__table">
                <tr class="table__row">
                    <th class="table__header">ID</th>
                    <th class="table__header">Name</th>
                    <th class="table__header">Email</th>
                    <th class="table__header"></th>
                </tr>
                @foreach ($users as $user)
                    <tr class="table__row">
                        <td class="table__data data__id">{{ $user->id }}</td>
                        <td class="table__data data__name">{{ $user->name }}</td>
                        <td class="table__data data__email">{{ $user->email }}</td>
                        <td class="table__data data__delete">
                            <form class="form__wrap" action="/admin/mypage/delete-user" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button class="submit-button" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links('vendor/pagination/paginate') }}
        </div>
    </div>
@endsection