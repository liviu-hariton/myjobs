<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyJobs</title>

    @vite(['resources/css/app.css'])
</head>
<body>
<div class="col-lg-8 mx-auto p-4 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
            <i class="fab fa-bootstrap fa-2xl"></i>
            <span class="fs-4">MyJobs</span>
        </a>
    </header>

    {{ $slot }}

    {{--<main>
        <h1 class="text-body-emphasis">Get started with Bootstrap</h1>
        <p class="fs-5 col-md-8">Quickly and easily get started with Bootstrap's compiled, production-ready files with this barebones example featuring some basic HTML and helpful links. Download all our examples to get started.</p>
    </main>--}}

    <footer class="pt-5 my-5 text-body-secondary border-top">
        Created with Laravel &amp; Bootstrap &copy; 2023
    </footer>
</div>

@vite(['resources/js/app.js'])
</body>
</html>
