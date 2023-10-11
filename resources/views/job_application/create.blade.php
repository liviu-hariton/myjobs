<x-layout>
    <x-breadcrumbs :section="'jobs'" :data="$job" />

    <x-card :$job />

    <div class="card bg-white">
        <div class="card-body">
            <h4 class="card-title">Your job application</h4>
            <div class="card-text">
                <form method="post" action="{{ route('job.application.store', $job) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="number" @class(['form-control', 'is-invalid' => $errors->has('expected_salary')]) placeholder="Your expected salary" name="expected_salary" id="expected_salary" value="{{ old('expected_salary') }}">
                        <span class="input-group-text">EUR</span>
                    </div>
                    @error('expected_salary')
                    <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                    @enderror

                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload your resume</label>
                        <input @class(['form-control', 'is-invalid' => $errors->has('cv')]) type="file" id="cv" name="cv">
                        @error('cv')
                        <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-success w-100 mt-2"><i class="fa fa-check-circle"></i> Apply</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
