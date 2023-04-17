<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Choose one</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="antialiased">
    <div class="flex justify-center mt-2">
        <a href="{{ route('login') }}"
        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            <div class="text-left">
                <div class="-mt-1 font-sans text-lg font-semibold">Login</div>
            </div>
        </a>
        <a href="{{ route('register') }}"
            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
            <div class="text-left">
                <div class="-mt-1 font-sans text-lg font-semibold">Register</div>
            </div>
        </a>
    </div>

    <div
        class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Choose Products view</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Blade is with cache</p>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Livewire loads dynamically</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href="{{ route('blade-version') }}"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center p-8 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <div class="text-left">
                    <div class="-mt-1 font-sans text-2xl font-semibold">Blade version</div>
                </div>
            </a>
            <a href="{{ route('livewire-version') }}"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center p-8 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <div class="text-left">
                    <div class="-mt-1 font-sans text-2xl font-semibold">Livewire version</div>
                </div>
            </a>
            <a href="{{ route('products') }}"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center p-8 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <div class="text-left">
                    <div class="-mt-1 font-sans text-2xl font-semibold">Most popular tags</div>
                </div>
            </a>
        </div>
    </div>
    @livewireScripts()
</body>

</html>
