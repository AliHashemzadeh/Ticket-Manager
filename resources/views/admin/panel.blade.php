@extends('layouts.admin')

@section('content')
    @include('admin.notifications')

    @if($users && count($users) > 0)

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                </tr>
            </thead>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if($user->role == 1) ادمین @else کاربر عادی @endif</td>
                </tr>
                @endforeach

        </table>
    @endif


    @endsection