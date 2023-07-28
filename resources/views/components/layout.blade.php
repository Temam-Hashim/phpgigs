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
    <title>PHPGigs| Find PHP Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4 bg-laravel text-white">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-xs md:text-base">
            @auth

                <li class="font-bold hidden sm:block text-center mt-3"> <span>welcome {{ auth()->user()->name }}</span>
                    @if (auth()->user()->role == 'admin')
                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/admin"><i class="fa-solid fa-gear"></i>
                        Admin
                    </a>
                </li>
                @endif

                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/jobs/manage"><i class="fa-solid fa-gear"></i>
                        Manage Job
                    </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="p-3 bg-gray-950 hover:bg-red-500 rounded-md"> <i
                                class="fa-solid fa-sign-out"></i>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/register"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li class="p-3 bg-gray-950 rounded-md hover:bg-green-500">
                    <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </li>
            @endauth
        </ul>
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
