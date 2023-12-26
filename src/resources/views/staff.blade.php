@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('main')
    <h2 class="main-title">スタッフ一覧</h2>
    <form class="invitation-form__wrap" action="/shop-owner/invite-shop-staff" method="post">
        @csrf
        <label class="form__label">メールアドレス：<input class="form__input-email" type="email" name="email" required></label>
        <button class="invitation-button">スタッフを招待する</button>
    </form>
    <div class="tab-wrap__group table__group">
        <table class="table">
            <tr class="table__row">
                <th class="table__header users-table__id">ID</th>
                <th class="table__header users-table__name">Name</th>
                <th class="table__header users-table__email">Email</th>
                <th class="table__header users-table__delete"></th>
            </tr>
            @foreach ($shopStaff as $staff)
                <tr class="table__row">
                    @foreach($staff->users as $user)
                        <td class="table__data">{{ $user->id }}</td>
                        <td class="table__data">{{ $user->name }}</td>
                        <td class="table__data">{{ $user->email }}</td>
                        <td class="table__data users-table__delete">
                            <form class="form__wrap" action="/shop-owner/delete-shop-staff{{ $shop_id }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->pivot->id }}">
                                <button class="submit-button" type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        {{ $shopStaff->links('vendor/pagination/paginate') }}
    </div>
@endsection