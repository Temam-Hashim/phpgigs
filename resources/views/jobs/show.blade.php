<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    @include('partials._search')

    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col w-full justify-center">
                    <img class="w-full mr-6 mb-6"
                        src="{{ $job->picture ? asset('storage/' . $job->picture) : asset('/images/default.jpg') }}"
                        alt="" style="max-width:400px;height:200px" />

                    <h3 class="text-xl mb-2">{{ $job->title }}</h3>
                    <div class="text-xl font-bold mb-4">{{ $job->company }}</div>


                    {{-- tag listings --}}

                    <x-job-tags :tagCsv="$job->tags" />

                    <div class="text-md my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $job->location }}
                    </div>
                </div>
                <div class="border border-gray-200 w-full"></div>
                <div class="m-0">
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-2 ">
                        {{ $job->description }}

                        {{-- <div class="flex flex-col justify-center items-center w-full m-2"> --}}
                        <a href="mailto: {{ $job->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 w-full m-3 text-center"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Employer</a>

                        <a href=" {{ $job->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80 w-full m-3 text-center"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website</a>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </x-card>

        {{-- @auth
            @if ($job->user_id == auth()->id())
                <div class="p-5 mt-3 ml-5 mr-3 flex flex-row mt-0">
                    <a href="/jobs/{{ $job->id }}/edit"
                        class="bg-cyan-700 text-white px-7 py-2 rounded hover:bg-gray-950 mr-3">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <form method="POST" action="/jobs/{{ $job->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-700 text-white px-7 py-2 rounded hover:bg-gray-950 mr-3">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth --}}

    </div>
</x-layout>
