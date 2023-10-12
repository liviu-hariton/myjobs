<x-layout>
    <x-breadcrumbs section="my-jobs" />

    <div class="card bg-white">
        <div class="card-body">
            <h4 class="card-title mb-5">Edit job</h4>

            <div class="card-text">
                <form method="post" action="{{ route('my-jobs.update', $job) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) placeholder="Job title" name="title" id="title" value="{{ old('title', $job->title) }}">
                            </div>
                            @error('title')
                            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('location')]) placeholder="Job location" name="location" id="location" value="{{ old('location', $job->location) }}">
                            </div>
                            @error('location')
                            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('description')]) placeholder="Job description" name="description" id="description" rows="5">{{ old('description', $job->description) }}</textarea>
                    </div>
                    @error('description')
                    <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                    @enderror

                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="number" @class(['form-control', 'is-invalid' => $errors->has('salary')]) placeholder="Offered salary" name="salary" id="salary" value="{{ old('salary', $job->salary) }}">
                                <span class="input-group-text">EUR</span>
                            </div>
                            @error('salary')
                            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                            @enderror
                        </div>
                        <div class="col">
                            <span class="form-text">Experience</span>

                            <x-radio-group name="experience" :all="false" :value="old('experience', $job->experience)" :options="array_combine(array_map('ucfirst', \App\Models\Job::$experience), \App\Models\Job::$experience)" />
                        </div>
                        <div class="col">
                            <span class="form-text">Category</span>

                            <x-radio-group name="category" :all="false" :value="old('category', $job->category)" :options="\App\Models\Job::$category" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-success w-100 mt-2"><i class="fa fa-check-circle"></i> Save Job</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
