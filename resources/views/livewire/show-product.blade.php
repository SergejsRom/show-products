<div>
    <div
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
            src="storage/{{ $product->photo }}" alt="{{ $product->photo }}">
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
            <button wire:click="$emit('closeModal')" type="button"
                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 mt-2">Close
                modal</button>
        </div>
    </div>
</div>
