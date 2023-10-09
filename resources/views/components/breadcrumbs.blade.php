<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>

        {{--jobs section--}}
        @if(isset($section) && $section === 'jobs')
            @if(isset($data->title))
                <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">Jobs</li>
            @endif
        @endif
    </ol>
</nav>
