<x-layout>
    <div class="mx-4">
        <x-card class="p-10">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Jobs
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <a href="/jobs/create">
                            <button class="bg-gray-950 text-white px-5 py-3 rounded-md hover:bg-laravel">
                                ADD NEW POST
                            </button>
                        </a>
                    </div>
                    <div>

                        <form methood="GET" action="/admin/jobLists" class="mb-3">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search users .... " name="search">
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

            </header>

            <table class="w-full table-auto rounded-sm">
                <thead class="text-left bg-cyan-600">
                    <th class="p-3">Job Title</th>
                    <th class="p-3">Job by</th>
                    <th class="p-3">posted on</th>
                    <th class="p-3">action</th>
                </thead>
                <tbody>
                    @unless ($jobs->isEmpty())
                        @foreach ($jobs as $job)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/jobs/{{ $job->id }}">
                                        {{ $job->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/jobs/{{ $job->id }}">
                                        {{ $job->user->name }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/jobs/{{ $job->id }}">
                                        {{ $job->created_at }}
                                    </a>
                                </td>

                                <td class="px-4 py-8 border-t border-b border-gray-300 text-md flex flex-row items-center">
                                    <a href="/jobs/{{ $job->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                    <form method="POST" action="/jobs/{{ $job->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="text-center">No Jobs found</p>
                            </td>
                        </tr>

                    @endunless
                </tbody>
            </table>
        </x-card>

        <div class="pt-6 m-6 mt-10 ">{{ $jobs->links() }}</div>
    </div>

</x-layout>
