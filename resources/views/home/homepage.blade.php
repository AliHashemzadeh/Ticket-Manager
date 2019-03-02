@extends('layouts.home')

@section('content')

    <div class="container">
        @include('home.notifications')

        <div class="row">
            @if(!empty($events))
            <div class="col-lg-3">

                <h1 class="my-4">اسامی فیلم ها</h1>
                @foreach($events as $event)
                <div class="list-group">
                <a href="{{ url('/event/'. $event->id) }}" class="list-group-item">{{ $event->name }}</a>
                </div>
                @endforeach

            </div>
            @endif
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <img class="d-block img-fluid" style="margin: 0 auto" src="{{ asset('images/'. $firstEvent->image) }}" alt="{{ $firstEvent->name }}">
                        </div>

                        @foreach($twoEvents as $event)
                        <div class="carousel-item">
                            <img class="d-block img-fluid" style="margin: 0 auto" src="{{ asset('images/'. $event->image) }}" alt="{{ $event->name }}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">
                    @foreach($events as $event)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="{{ asset('images/'. $event->image) }}" alt="{{ $event->name }}"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ $event->name }}</a>
                                </h4>
                                <h5>{{ $event->genre }}</h5>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('/event/'. $event->id) }}" class="btn btn-outline-success">خرید بلیت</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection