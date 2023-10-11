<div>
    <a href="{{ route('job.index', ['category' => $job->category]) }}" class="me-2 badge rounded-pill text-bg-light">{{ $job->category }}</a>
    <a href="{{ route('job.index', ['experience' => $job->experience]) }}" class="badge rounded-pill text-bg-light">{{ Str::ucfirst($job->experience) }} level</a>
</div>
