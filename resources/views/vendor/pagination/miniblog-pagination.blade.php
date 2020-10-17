@if ($paginator->hasPages())
  <div class="custom-pagination">
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <span>{{ $element }}</span>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <span>{{ $page }}</span>
          @else
            <a href="{{ $url }}">{{ $page }}</a>
          @endif
        @endforeach
      @endif
    @endforeach
  </div>
@endif
