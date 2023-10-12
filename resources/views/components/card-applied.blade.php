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

        @if($job->deleted_at)
            <span class="text-danger">Job deleted {{ $job->deleted_at->diffForHumans() }}</span>
        @endif
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('job.show', $job) }}" class="btn btn-sm btn-primary">Job details</a>
            </div>
            <div class="col">
                <span class="text-info">
                    <i class="fa fa-check-to-slot"></i> applied {{ $application->created_at->diffForHumans() }}
                    with {{ number_format($application->expected_salary) }} EUR asked salary
                </span><br />
                <span class="text-secondary">
                    <small>
                        average asked salary: {{ number_format($application->job->job_applications_avg_expected_salary) }} EUR
                        from {{ $application->job->job_applications_count - 1 }} {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                    </small>
                </span>
            </div>
            <div class="col text-end">
                <form method="post" action="{{ route('my-job-applications.destroy', $application) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-cancel"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
