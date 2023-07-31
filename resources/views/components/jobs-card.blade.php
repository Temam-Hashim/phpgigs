@props(['job'])

<x-card>
    <div class="flex flex-col md:flex-row border-bottom-1">
        <a href="/jobs/{{ $job->id }}">
            <img class="w-48 mr-6 md:block max-w-[100%]  md:w-[280px] md:h-[200px] "
                src="{{ $job->picture ? asset('storage/' . $job->picture) : asset('/images/default.jpg') }}"
                alt="" />
        </a>
        <div class="flex flex-col justify-center">
            <h4 class="text-xl justify-center">
                <a href="/jobs/{{ $job->id }}">{{ substr($job->title, 0, 50) . '...' }}</a>
            </h4>
            <div class="text-md font-bold mb-4">
                {{ $job->company }}
            </div>

            {{-- tag listings --}}

            <x-job-tags :tagCsv="$job->tags" />


            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
                {{ $job->location }}
            </div>
        </div>
    </div>
</x-card>
