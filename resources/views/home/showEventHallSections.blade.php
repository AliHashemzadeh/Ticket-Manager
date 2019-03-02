@extends('layouts.home')
@section('header')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
    @include('home.notifications')
    @include('home.partials.errors')


    <div class="container">
        <div class="card my-5">
            <div class="card-header">
                {{ $card_title }}
            </div>
            <div class="card-body">
                <span>ابتدا جایگاه مورد نظر را انتخاب کنید :</span>
                <br><br>
                <div class="text-center ml-5">
                    <a class="section">پرده نمایش</a>
                    @foreach($sections as $section)
                        <a href="{{ url('/event/' . $event_id . '/halls/' . $hall_id . '/sections/' . $section->id) }}" class="section">{{ $section->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection