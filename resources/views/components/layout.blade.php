<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyJobs</title>

    @vite(['resources/css/app.css'])
</head>
<body>
<div class="col-lg-8 mx-auto p-4 py-md-1">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <i class="fab fa-bootstrap fa-2xl"></i>
                <span class="fs-4">MyJobs</span>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="{{ route('job.index') }}" class="nav-link px-2">All Jobs</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @auth()
                <div class="dropdown d-inline-block ms-2">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><span class="dropdown-item-text text-light-emphasis"><i class="fa fa-user-alt"></i> {{ auth()->user()->name }}</span></li>
                        <li><a class="dropdown-item" href="{{ route('my-job-applications.index') }}">My applications</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="post" action="{{ route('auth.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-link text-decoration-none text-dark"><i class="fa fa-sign-out"></i> Sign out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('auth.create') }}" class="btn btn-outline-primary d-inline-block">Login</a>
            @endauth
        </div>
    </header>

    @if(session('success'))
    <div class="alert alert-success">
        <i class="fa fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fa fa-times-rectangle"></i> {{ session('error') }}
        </div>
    @endif

    {{ $slot }}

    <footer class="pt-5 my-5 text-body-secondary border-top">
        Created with Laravel &amp; Bootstrap &copy; 2023
    </footer>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
