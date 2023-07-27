<x-layout>

    <div class="mx-4" style="background-image:url({{ asset('images/hero.jpg') }})">
        <x-card class=" p-10 max-w-3xl mx-auto mt-24 bg-formbg text-white opacity-80">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Gig
                </h2>
                <p class="mb-4">Post a gig to find a developer</p>
            </header>

            <form method="POST" action="/jobs">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="mb-6">
                        <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="company" placeholder="Example: Facebook, Microsoft..." />
                        @error('company')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="title" placeholder="Example: Senior Laravel Developer" />
                        @error('title')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="location" placeholder="Example: Remote, Boston MA, etc" />
                        @error('location')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="email" placeholder="Example: test@gmail.com" />
                        @error('email')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="website" class="inline-block text-lg mb-2">
                            Website/Application URL
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="website" placeholder="Example: tcodertech.com" />
                        @error('website')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags" class="inline-block text-lg mb-2">
                            Tags (Comma Separated)
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" />
                        @error('tags')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                        name="logo" />
                </div> --}}

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Job Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full text-gray-950" name="description" rows="10"
                        placeholder="Include tasks, requirements, salary, etc"></textarea>
                    @error('description')
                        <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 relative">
                    <button type="submit"
                        class=" md:absolute md:right-1 bg-blue-500 px-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Create Gig
                    </button>

                    <a href="/"
                        class="bg-red-500 px-8 hover:bg-rose-700 text-white font-bold py-2 px-4 border-b-4 border-red-250 hover:border-rose-600 rounded">
                        Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
