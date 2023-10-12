<x-layout>
    <x-breadcrumbs :section="'new-employer'" />

    <div class="card bg-white">
        <div class="card-body">
            <h4 class="card-title mb-5">Create employer</h4>

            <div class="card-text">
                <form method="post" action="{{ route('employer.store') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('company_name')]) placeholder="Your company name" name="company_name" id="company_name" value="{{ old('company_name') }}">
                    </div>
                    @error('company_name')
                    <p><span class="badge text-bg-danger">{{ $message }}</span></p>
                    @enderror

                    <button type="submit" class="btn btn-outline-success w-100 mt-2"><i class="fa fa-plus"></i> Create</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
