@if ($paginator->hasPages())
    <div class="flex items-center justify-between mt-4">
        {{-- Left side: Showing X to Y of Z --}}
        <div class="btn">
            Menampilkan 
            <span class="font-medium">{{ $paginator->firstItem() }}</span> sampai 
            <span class="font-medium">{{ $paginator->lastItem() }}</span> dari 
            <span class="font-medium">{{ $paginator->total() }}</span> hasil
        </div>

        {{-- Right side: Pagination buttons --}}
        <div class="btn-group">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-disabled">«</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="btn btn-disabled">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="btn btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn">»</a>
            @else
                <button class="btn btn-disabled">»</button>
            @endif
        </div>
    </div>
@endif
