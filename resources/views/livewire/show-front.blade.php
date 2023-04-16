<div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-12">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Size
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tags
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-12 h-12" src="storage/{{ $product->photo }}" alt="{{ $product->photo }}">
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $product->sku }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->size }}
                        </td>
                        <td class="px-6 py-4">
                            @forelse ($product->tags as $tag)
                                @foreach ($tag as $key => $value)
                                <h5 class="text-black"> {{ $key }} : {{ $value }} </h5> 
                                @endforeach
                            @empty
                                No tags
                            @endforelse
                            
                            

                        </td>
                        <td class="px-6 py-4">
                            <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Show</button>
                        </td>
                        
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @if ($showLoadMoreButton)
    <div class="flex justify-center my-4">
        <button wire:click="loadProducts" type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Load 20 more products</button>
    </div>
    @endif

</div>
