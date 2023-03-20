@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white mt-1 px-24 py-1">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
