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
</head>

<body class="antialiased">
    <div class="flex">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 m-24 mt-12 border">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tag name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        @forelse ($value['tags'] as $key => $tag)
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white font-extrabold	">
                                {{ $tag['title'] }}
                            </th>
                        @empty
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                Products without tags
                            </th>
                        @endforelse
                        <td class="px-6 py-4">
                            {{ $value['qty'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
