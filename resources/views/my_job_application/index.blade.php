<x-layout>
    <x-breadcrumbs :section="'my-applications'" />

    @forelse($applications as $application)
        <x-card-applied :job="$application->job" :$application></x-card-applied>
    @empty
        <div class="alert alert-info text-center">
            You haven't applied to any jobs yet. <a href="{{ route('job.index') }}" class="text-info fw-bold text-decoration-none">View all jobs</a> and apply for one or more of them
        </div>
    @endforelse
</x-layout>
