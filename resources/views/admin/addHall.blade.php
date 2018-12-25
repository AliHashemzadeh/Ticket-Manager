@extends('layouts.admin')
@section('content')
    @include('admin.notifications')
    <form action="" method="post" class="col-xs-12 col-md-6">
        @csrf
        <div class="form-group">
            <label for="name">اسم</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="capacity">ظرفیت</label>
            <input type="number" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success px-4">ثبت</button>
        </div>

    </form>
@endsection