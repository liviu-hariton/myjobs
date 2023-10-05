<x-layout>
    @foreach($jobs as $job)
        <x-card :job="$job"></x-card>
    @endforeach
</x-layout>
