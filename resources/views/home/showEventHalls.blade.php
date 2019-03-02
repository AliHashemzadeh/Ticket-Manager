@extends('layouts.home')
@section('content')
    @include('home.notifications')
    @include('home.partials.errors')
    <div class="container">
        <div class="card my-5">
            <div class="card-header">
                {{ $card_title }}
            </div>
            <div class="card-body">
                @foreach($halls as $hall)
                    <div class="list-group col-md-2">
                        <a href="{{ url('/event/'. $event_id . '/halls/' . $hall->id) }}" class="list-group-item list-group-item-action">{{ $hall->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection