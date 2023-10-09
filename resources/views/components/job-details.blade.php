<div class="card mb-3 bg-white">
    <div class="card-header"><span class="badge bg-info float-end fs-6">{{ number_format($job->salary) }} EUR</span></div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col">
                <span class="me-2">{{ $job->employer->company_name }}</span>
                <span>{{ $job->location }}</span>
            </div>
            <div class="col text-end">
                <x-tags :$job />
            </div>
        </div>

        <h3 class="card-title">{{ $job->title }}</h3>
        <div class="card-text">
            <p class="text-light-emphasis">{!! nl2br(e($job->description)) !!}</p>
        </div>
    </div>
</div>

<h4 class="mb-3 mt-5">Other jobs from {{ $job->employer->company_name }}</h4>

@foreach($job->employer->jobs as $other_job)
    <x-card :job="$other_job"></x-card>
@endforeach
