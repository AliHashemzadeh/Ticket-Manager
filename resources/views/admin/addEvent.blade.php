@extends('layouts.admin')
@section('content')
    @include('admin.notifications')
    @include('admin.partials.errors')
    <form action="" method="post" class="col-xs-12 col-md-6" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">اسم</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="genre">ژانر</label>
            <input type="text" class="form-control" name="genre" id="genre" value="{{ old('genre') }}">
        </div>

        <div class="form-group">
            <label for="capacity">توضیحات</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
        </div>

        <div class="form-group">
            <label for="start">شروع</label>
            <input type="datetime-local" class="form-control" name="start" id="start" value="{{ old('start') }}">
        </div>

        <div class="form-group">
            <label for="end">پایان</label>
            <input type="datetime-local" class="form-control" name="end" id="end" value="{{ old('end') }}">
        </div>

        <div class="form-group">
            <label for="image">عکس رویداد</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success px-4">ثبت</button>
        </div>

    </form>
@endsection