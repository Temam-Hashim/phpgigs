<x-layout>
    <div class="mx-4" style="background-image:url({{ asset('images/hero.jpg') }})">
        <x-card class="p-10 max-w-lg mx-auto mt-24 bg-formbg text-white opacity-80">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
                <p class="mb-4">Create an account to post gigs</p>
            </header>
            <form action="">
                <div class="grid grid-cols-1 md:grid-cols-2  gap-3">
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" />
                    </div>
                </div>
                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">
                        Confirm Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password2" />
                </div>
                <div class="relative">
                    <button type="submit"
                        class=" md:absolute md:right-1 bg-blue-500 px-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Register
                    </button>
                </div>

                <div class="mt-2">
                    <p>
                        Already have an account?
                        <a href="/login" class="text-cyan-500 font-bold px-3">Login</a>
                    </p>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
