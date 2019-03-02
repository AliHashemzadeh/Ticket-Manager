@extends('layouts.home')
@section('header')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <div class="seats-help">
                    <div>
                        <span class="seatActive"></span>
                        <span>قابل خرید</span>
                    </div>
                    <div>
                        <span class="seatBuy"></span>
                        <span>فروخته شده</span>
                    </div>
                    <div>
                        <span class="seatReserve"></span>
                        <span>رزرو</span>
                    </div>
                    <div>
                        <span class="seat"></span>
                        <span>غیر قابل خرید</span>
                    </div>
                    <div>
                        <span class="seatSelect"></span>
                        <span>انتخاب شما</span>
                    </div>

                </div>
                <br><br>
                <div class="text-center m-5" style="font-size: 11px" dir="ltr">
                    <div class="bg-secondary mb-4" style="font-size: 20px;margin-left: 200px;margin-right: 200px">پرده نمایش</div>
                    @for($i = 1; $i <= $rows; $i++)
                        <div class="row" style="display: table; margin: 0 auto;">
                            <span class="pl-2">{{ $i }}</span>
                            @foreach($seats as $seat)

                                @if($seat->row_number == $i)
                                    <div id="{{ $seat->id }}"
                                         class="seatActive text-center">{{ $seat->seat_number }}</div>
                                @endif
                            @endforeach
                        </div>

                    @endfor


                </div>

            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection