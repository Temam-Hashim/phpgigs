@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-1 left-1/3 transform-translate-x-1/2 bg-red-900 rounded-md text-white px-48 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
