@extends('layouts.admin')
@section('content')
    @include('admin.notifications')
    @include('admin.partials.errors')
    <form action="" method="post" class="col-xs-12 col-md-6">
        @csrf
        <div class="form-group">
            <label for="name">اسم</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for=""></label>
            <select class="custom-select" name="hall_id">
                <option value="" selected>انتخاب سالن</option>
                @foreach($halls as $hall)
                    <option value="{{ $hall->id }}">{{ $hall->name }} (ظرفیت : {{ $hall->capacity }} )</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success px-4 mt-3">ثبت</button>
        </div>

    </form>
@endsection