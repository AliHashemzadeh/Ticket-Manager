@extends('layouts.home')
@section('content')
    @include('home.notifications')
    @include('home.partials.errors')
    <div class="container">
        <div class="card my-5">
            <div class="card-header">
               {{ $card_title }}
            </div>
            @foreach($events as $event)
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <img class="d-block img-fluid" src="{{ asset('images/'. $event->image) }}" alt="{{ $event->name }}">
                        </div>

                        <div class="col-lg-9">
                            <p><span class="font-weight-bold">توضیحات : </span><br>{{ $event->description }}</p>
                            <a href="{{ url('/event/'. $event->id . '/halls') }}" class="btn btn-outline-success">نمایش سالن ها</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection