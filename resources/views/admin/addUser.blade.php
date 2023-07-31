<x-layout>

    <div class="mx-4" style="background-image:url({{ asset('images/hero.jpg') }})">
        <x-card class=" p-10 max-w-3xl mx-auto mt-24 bg-formbg text-white opacity-80">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Add User
                </h2>
                <p class="mb-4">Add new user</p>
            </header>

            <form method="POST" action="/admin/userLists/new" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                    <div class="mb-6">
                        <label for="company" class="inline-block text-lg mb-2">Name</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="name" placeholder="Example: John, Doe..." value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Email</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="email" placeholder="Example: test@gmail.com" value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Role</label>
                        <select name="role" id="role"
                            class="border border-gray-200 rounded p-2 w-full text-gray-950" required>
                            <option value="">select Role</option>
                            <option value="admin">admin</option>
                            <option value="creator">creator</option>
                        </select>

                        @error('role')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Password</label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="password" placeholder="password here.." value="" />
                        @error('password')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Confirm Password</label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full text-gray-950"
                            name="password_confirmation" placeholder="confirm password ..." value="" />
                        @error('password_confirmation')
                            <p class="text-red-400 text-sm m-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>



                <div class="mb-6 relative">
                    <button type="submit"
                        class=" md:absolute md:right-1 bg-blue-500 px-8 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        ADD USER
                    </button>

                    <a href="/admin"
                        class="bg-red-500 px-8 hover:bg-rose-700 text-white font-bold py-2 px-4 border-b-4 border-red-250 hover:border-rose-600 rounded">
                        BACK </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
