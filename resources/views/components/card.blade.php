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
        <a href="{{ route('job.show', $job) }}" class="btn btn-sm btn-primary">Job details</a>

        @if(isset(auth()->user()->id) && auth()->user()->id === $job->employer->user_id)
        <form method="post" action="{{ route('my-jobs.destroy', $job) }}" class="d-inline-block">
            <a href="{{ route('my-jobs.edit', $job) }}" class="btn btn-sm btn-warning">Edit Job</a>

            @if(!$job->deleted_at)
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            @endif
        </form>
        @endif

        <span class="float-end text-end">
            <small>
                <i class="fa fa-clock"></i> created {{ $job->created_at->diffForHumans() }}
                <i class="fa fa-clock"></i> updated {{ $job->updated_at->diffForHumans() }}
            </small>
        </span>
    </div>
</div>

@if(isset($applications))
<div class="card mb-3 bg-white">
    <div class="card-header">Current Job applications</div>
    <div class="card-body">
        @forelse($applications as $application)
            <div class="row">
                <div class="col">
                    <strong><i class="fa fa-user-circle"></i> {{ $application->user->name }}</strong>
                    - <a href="{{ asset($application->cv_path) }}" class="text-info-emphasis text-decoration-none" target="_blank"><i class="fa fa-file-pdf"></i> download CV</a>
                    <br />
                    <small>Applied {{ $application->created_at->diffForHumans() }}</small>
                </div>
                <div class="col text-end">
                    Expected salary: {{ number_format($application->expected_salary) }} EUR
                </div>
            </div>
        @empty
        <div class="alert alert-info">
            Currently, there are no applications for this job.
        </div>
        @endforelse
    </div>
</div>
@endif
