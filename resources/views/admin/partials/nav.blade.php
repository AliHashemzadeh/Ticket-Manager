<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('admin.panel') }}">پنل ادمین</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('admin.panel') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    لیست کاربران
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.panel') }}">لیست کاربران</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">اضافه کردن رویداد</a>
                    <a class="dropdown-item" href="{{ route('admin.hall') }}">اضافه کردن سالن</a>
                    <a class="dropdown-item" href="{{ route('admin.section') }}">اضافه کردن بخش</a>
                    <a class="dropdown-item" href="{{ route('admin.seat') }}">اضافه کردن صندلی</a>
                </div>
            </li>

        </ul>

    </div>
</nav>