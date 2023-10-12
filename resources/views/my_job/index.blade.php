<x-layout>
    <x-breadcrumbs section="my-jobs" />

    <a href="{{ route('my-jobs.create') }}" class="btn btn-outline-success mb-5"><i class="fa fa-plus-square"></i> Create New Job</a>

    @forelse($jobs as $job)
        <x-card :$job :applications="$job->jobApplications"></x-card>
    @empty
        <div class="alert alert-info text-center">
            You haven't created new jobs yet. <a href="{{ route('my-jobs.create') }}" class="text-info fw-bold text-decoration-none">Create a new job</a>
        </div>
    @endforelse
</x-layout>
