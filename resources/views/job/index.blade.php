<x-layout>
    <x-breadcrumbs :section="'jobs'" />

    <div class="card mb-3 bg-white">
        <div class="card-body">
            <form method="get" action="{{ route('jobs.index') }}" id="filtering-form">
                <div class="row">
                    <div class="col-6">
                        <span class="form-text">Search</span>
                        <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for a job title" form-id="filtering-form" />
                    </div>
                    <div class="col-6">
                        <span class="form-text">Salary</span>

                        <div class="d-flex flex-row">
                            <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" class="me-2" form-id="filtering-form" />
                            <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" form-id="filtering-form" />
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <span class="form-text">Experience</span>

                        <x-radio-group name="experience" :options="array_combine(array_map('ucfirst', \App\Models\Job::$experience), \App\Models\Job::$experience)" />
                    </div>
                    <div class="col-6 mt-2">
                        <span class="form-text">Category</span>

                        <x-radio-group name="category" :options="\App\Models\Job::$category" />
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary w-100 mt-2"><i class="fa fa-filter"></i> Filter</button>
            </form>
        </div>
    </div>

    @foreach($jobs as $job)
        <x-card :$job></x-card>
    @endforeach
</x-layout>
