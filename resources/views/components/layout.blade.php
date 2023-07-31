<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script> --}}
    <title>PHPGigs| Find PHP Jobs & Projects</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#0e538f",
                        hover: '#141314',
                        formbg: '#16117a',
                    },
                },
            },
        };
    </script>
</head>

<body class="mb-48">

    <nav class="flex justify-between items-center mb-4 bg-laravel text-white">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        @auth
            <span class="text-bold text-xs md:text-md">welcome <b>{{ auth()->user()->name }}</b></span>
            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                class="text-white p-5 bg-gray-950 mr-5 hover:bg-hover focus:ring-4 focus:outline-none focus:ring-gray-700 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-950 dark:hover:bg-hover dark:focus:ring-blue-800"
                type="button">Actions <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownHover"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                    @if (auth()->user()->role == 'admin')
                        <li>
                            <a href="/admin"
                                class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                        </li>
                    @endif
                    <li>
                        <a href="/jobs/manage"
                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manage</a>
                    </li>
                    <li>
                        <a href="/profile"
                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <ul class="flex space-x-6 mr-6 text-xs md:text-base">
                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/register"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </li>
            </ul>
        @endauth
    </nav>

    {{-- views will come here --}}
    <main>
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex  items-center justify-start font-bold text-white h-24 mt-24 opacity-90 md:justify-center bg-gray-950">
        <p class="ml-2 text-xs">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/jobs/create"
            class="absolute top-1/3 right-10  p-3 px-5 bg-gradient-to-r from-blue-500 to-blue-900 rounded-md hover:from-green-500 hover:to-cyan-500">Post
            Job</a>
    </footer>
    {{-- flash message --}}
    <x-flash-message />
</body>

</html>
