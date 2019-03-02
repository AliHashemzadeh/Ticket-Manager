<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود کاربران</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body dir= "rtl">
<div class="login-form">
    <form action="" method="post">
        @csrf
        <h2 class="text-center">ورود</h2>
        @include('home.partials.errors')
        @include('home.notifications')
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="ایمیل" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="رمزعبور">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">ورود</button>
        </div>
        <div class="clearfix">
            <label class="pull-right checkbox-inline"><input type="checkbox"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;من را بخاطر بسپار</label>
        </div>
    </form>
    <p class="text-center">حساب کاربری ندارید؟ <a href="{{ route('register.view') }}">ثبت نام</a></p>
</div>
</body>
</html>