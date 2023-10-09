<div>
    <a href="{{ route('jobs.index', ['category' => $job->category]) }}" class="me-2 badge rounded-pill text-bg-light">{{ $job->category }}</a>
    <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}" class="badge rounded-pill text-bg-light">{{ Str::ucfirst($job->experience) }} level</a>
</div>
