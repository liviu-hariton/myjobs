<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>

        {{--jobs section--}}
        @if(isset($section) && $section === 'jobs')
            @if(isset($data->title))
                <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Jobs</a></li>
                @if(Route::currentRouteName() !== 'job.application.create')
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('job.show', $data) }}">{{ $data->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Apply</li>
                @endif

            @else
                <li class="breadcrumb-item active" aria-current="page">Jobs</li>
            @endif
        @endif

        {{--my applications section--}}
        @if(isset($section) && $section === 'my-applications')
            <li class="breadcrumb-item active" aria-current="page">My Applications</li>
        @endif

        {{--new employer section--}}
        @if(isset($section) && $section === 'new-employer')
            <li class="breadcrumb-item active" aria-current="page">Create employer</li>
        @endif
    </ol>
</nav>
