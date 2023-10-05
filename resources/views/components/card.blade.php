<div class="card mb-3 bg-white">
    <div class="card-header"><span class="badge bg-info float-end fs-6">{{ number_format($job->salary) }} EUR</span></div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col">
                <span class="me-2">Company</span>
                <span>{{ $job->location }}</span>
            </div>
            <div class="col text-end">
                <span class="me-2 badge rounded-pill text-bg-light">{{ $job->category }}</span>
                <span class="badge rounded-pill text-bg-light">{{ Str::ucfirst($job->experience) }} level</span>
            </div>
        </div>

        <h3 class="card-title">{{ $job->title }}</h3>
        <div class="card-text">
            <p class="text-light-emphasis">{!! nl2br(e($job->description)) !!}</p>
        </div>
    </div>
    <div class="card-footer">Footer</div>
</div>
