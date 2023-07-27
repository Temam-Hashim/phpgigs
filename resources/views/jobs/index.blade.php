<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless (count($jobs) == 0)
            @foreach ($jobs as $job)
                <x-jobs-card :job="$job" />
            @endforeach
        @else
            <p>No Jobs found</p>
        @endunless

    </div>
</x-layout>
