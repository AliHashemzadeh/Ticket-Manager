<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">خوش آمدید</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            @if(!\Illuminate\Support\Facades\Auth::check())
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="{{ route('login.view') }}">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.view') }}">عضویت</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="nav-link text-success" >{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">خروج</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>