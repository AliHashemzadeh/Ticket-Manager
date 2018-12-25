@extends('layouts.admin')
@section('header')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')
    @include('admin.notifications')
    @include('admin.partials.errors')
    <span>ابتدا جایگاه مورد نظر را انتخاب کنید :</span>
    <br><br>
    <div class="text-center ml-5">
        <a class="section">سن</a>
        @foreach($sections as $section)
        <a href="{{ route('admin.showSection', $section->id) }}" class="section">{{ $section->name }}</a>
        @endforeach



    </div>


@endsection