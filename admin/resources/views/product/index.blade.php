<x-app-layout>
    <div class="w-full py-12 product-container">
        {{-- <a href="{{ route('note.create') }}" class="new-note-btn">
            New Note
        </a> --}}
        <div class="flex flex-wrap justify-center mx-auto products">
            @foreach ($products as $product)
                <div class="m-5 text-white border product basis-1/4 h-[300px] text-center">
                    <div class="p-2">
                        {{ $product->title }}
                    </div>
                    <div>
                        {{ $product->image }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
