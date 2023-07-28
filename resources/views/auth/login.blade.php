<x-layout>
    <div class="mx-4 h-100" style="background-image:url({{ asset('images/hero.jpg') }})">
        <x-card class="p-10 max-w-lg mx-auto mt-24 bg-formbg text-white opacity-80">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Log In
                </h2>
                <p class="mb-4">Log in to post gigs</p>
            </header>

            <form action="users/login" method="POST">
                @csrf
                @error('email')
                    <p class="text-white text-md m-3 bg-red-600 text-center rounded p-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full text-gray-950" name="email"
                        value="{{ old('email') }}" />
                </div>
                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                        name="password" />
                </div>

                <div class="relative">
                    <button type="submit"
                        class=" md:absolute md:right-1 bg-blue-500 px-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Login
                    </button>
                </div>

                <div class="mt-2">
                    <p>
                        Don't have an account?
                        <a href="/register" class="text-cyan-500 font-bold px-3">Register</a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
