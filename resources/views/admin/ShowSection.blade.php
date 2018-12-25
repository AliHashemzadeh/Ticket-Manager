@extends('layouts.admin')
@section('header')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')
    @include('admin.notifications')
    @include('admin.partials.errors')
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


        @for($i = 1; $i <= $rows; $i++)
            <div class="row" style="display: table; margin: 0 auto;">
                <span class="pl-2">{{ $i }}</span>
                @foreach($seats as $seat)

                    @if($seat->row_number == $i)
                        <div id="seat{{ $seat->id }}" class="seatActive text-center">{{ $seat->seat_number }}</div>
                    @endif
                @endforeach
            </div>

        @endfor


    </div>


@endsection

@section('footer')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection