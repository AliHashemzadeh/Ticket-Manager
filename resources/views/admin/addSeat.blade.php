@extends('layouts.admin')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @include('admin.notifications')
    @include('admin.partials.errors')

    <form action="" method="post" class="col-xs-12 col-md-6">
        @csrf

        <div class="form-group">
            <label for="seats">تعداد صندلی</label>
            <input type="number" class="form-control" name="seats" id="seats" value="{{ old('seats') }}">
        </div>

        <div class="form-group">
            <label for="rows">تعداد ردیف</label>
            <input type="number" class="form-control" name="rows" id="rows" value="{{ old('rows') }}">
        </div>

        <div class="form-group">
            <label for=""></label>
            <select class="custom-select" name="hall_id" id="hall_id">
                <option value="" selected>انتخاب سالن</option>
                @foreach($halls as $hall)
                    <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for=""></label>
            <select class="custom-select" name="section_id" id="section_id">
                <option value="" selected>انتخاب بخش</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success px-4 mt-3">ثبت</button>
        </div>

    </form>
@endsection

@section('footer')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
