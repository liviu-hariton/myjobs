<div class="card mb-3 bg-white">
    <div class="card-header"><span class="badge bg-info float-end fs-6">{{ number_format($job->salary) }} EUR</span></div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col">
                <span class="me-2">Company</span>
                <span>{{ $job->location }}</span>
            </div>
            <div class="col text-end">
                <x-tags :$job />
            </div>
        </div>

        <h3 class="card-title">{{ $job->title }}</h3>
    </div>
    <div class="card-footer">
        <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-primary">Job details</a>
    </div>
</div>