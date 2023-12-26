@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('main')
    <h2 class="main-title">ショップ一覧</h2>
    <div class="tab-wrap__group table__group">
        <table class="table">
            <tr class="table__row">
                <th class="table__header shops-table__id">ID</th>
                <th class="table__header shops-table__name">Name</th>
                <th class="table__header shops-table__email">Email</th>
                <th class="table__header shops-table__owner">Owner</th>
                <th class="table__header shops-table__confirm"></th>
            </tr>
            @foreach ($shops as $shop)
                <tr class="table__row">
                    <td class="table__data">{{ $shop->id }}</td>
                    <td class="table__data">{{ $shop->name }}</td>
                    @foreach($shop->users as $user)
                        <td class="table__data">{{ $user->email}}</td>
                        <td class="table__data">{{ $user->name }}</td>
                    @endforeach
                    <td class="table__data shops-table__confirm">
                        <a class="link-button" href="/admin/interactions/{{ $shop->id }}">やり取りを確認する</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $shops->links('vendor/pagination/paginate') }}
    </div>
@endsection