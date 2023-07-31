<x-layout>
    {{-- <img class="h-auto max-w-full rounded-lg"
    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt=""> --}}


    <div class="mx-4">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-cyan-500 p-10">
                <a href="/" class="hover:opacity-70 hover:transform">
                    <div class="flex flex-row justify-between text-center items-center ">
                        <span class="text-white text-lg font-bold mt-0 ml-0">Dashboard</span>
                        <div class="text-white"> <i class="fa fa-dashboard fa-4x" aria-hidden="true"></i> </div>
                    </div>
                </a>
            </div>

            <div class="bg-cyan-500 p-10">
                <a href="/admin/jobLists" class="hover:opacity-70 hover:transform">
                    <div class="flex flex-row justify-between text-center items-center ">
                        <span class="text-white text-lg font-bold mt-0 ml-0">Manage Jobs</span>
                        <div class="text-white"> <i class="fa-solid fa-list-check fa-4x"></i> </div>
                    </div>
                </a>
            </div>

            <div class="bg-cyan-500 p-10">
                <a href="/admin/userLists" class="hover:opacity-70">
                    <div class="flex flex-row justify-between text-center items-center ">
                        <span class="text-white text-lg font-bold mt-0 ml-0">Manage Users</span>
                        <div class="text-white"> <i class="fa-solid fa-users-gear fa-4x"></i> </div>
                    </div>
                </a>
            </div>

            <div class="bg-cyan-500 p-10">
                <a href="/profile" class="hover:opacity-70:text-gray-950">
                    <div class="flex flex-row justify-between text-center items-center ">
                        <span class="text-white text-lg font-bold mt-0 ml-0">Manage Profile</span>
                        <div class="text-white"> <i class="fa fa-gear fa-4x" aria-hidden="true"></i> </div>
                    </div>
                </a>
            </div>


        </div>
</x-layout>
