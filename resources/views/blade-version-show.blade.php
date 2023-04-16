<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Show Product</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="flex justify-center">

    <div
        class="self-center items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4 mt-8">
        <img class="object-cover w-full rounded-lg h-96 md:h-auto md:w-48 "
            src="../storage/{{ $product->photo }}" alt="{{ $product->photo }}">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->sku }}</h5>
            <span>Description:</span>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span>Size:</span> {{ $product->size }}</p>
            @forelse ($product->tags as $tag)
                @foreach ($tag as $key => $value)
                    <span>tags:</span>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $key }} :
                        {{ $value }} </p>
                @endforeach
            @empty
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> No tags </p>
            @endforelse
            <a class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900 mt-2"
                href="{{ route('blade-version') }}">To product list</a>
        </div>
    </div>

</body>

</html>
