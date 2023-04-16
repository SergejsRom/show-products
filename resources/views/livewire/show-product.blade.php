<div>
    <div
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
            src="storage/{{ $product->photo }}" alt="{{ $product->photo }}">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->sku }}</h5>
            <span>Description:</span> <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span>Size:</span> {{ $product->size }}</p>
            @forelse ($product->tags as $tag)
                                @foreach ($tag as $key => $value)
                                <span>tags:</span> <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ $key }} : {{ $value }} </p> 
                                @endforeach
                            @empty
                                No tags
                            @endforelse
        </div>
    </div>
</div>
