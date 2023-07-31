<x-layout>

    <div class="mx-4" style="background-image:url({{ asset('images/hero.jpg') }})">
        <x-card class=" p-10 max-w-3xl mx-auto mt-24 bg-formbg text-white opacity-80">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Update Profile
                </h2>
                <p class="mb-4">Edit: Profile</p>
            </header>

            <form method="POST" action="/profile/{{ auth()->id() }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">Your Name</label>
                        <input type="text" id="name"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" name="name"
                            placeholder="Example: Facebook, Microsoft..." value="{{ auth()->user()->name }}" />
                        @error('name')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Your Email</label>
                        <input type="text" id="email"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" name="email"
                            placeholder="Example: Senior Laravel Developer" value="{{ auth()->user()->email }}" />
                        @error('email')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="role" class="inline-block text-lg mb-2">Your Role</label>
                        <input type="disabled" id="role"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" name="role"
                            value="{{ auth()->user()->role }}" />
                        @error('role')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">Your Password</label>
                        <input type="password" id="password"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" name="password"
                            value="" />
                        @error('password')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
                        <input type="password" id="password2"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" name="password_confirmation"
                            value="" />
                        @error('password')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>


                </div>



                <div class="mb-6 relative">
                    <button type="submit"
                        class=" md:absolute md:right-1 bg-blue-500 px-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Update Profile
                    </button>

                    <a href="/"
                        class="bg-red-500 px-8 hover:bg-rose-700 text-white font-bold py-2 px-4 border-b-4 border-red-250 hover:border-rose-600 rounded">
                        Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
