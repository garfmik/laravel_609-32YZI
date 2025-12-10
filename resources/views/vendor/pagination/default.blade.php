@if ($paginator->hasPages())
    <div class="pagination-container mt-3">
        {{-- Пагинация по центру --}}
        <div class="pagination-wrapper text-center mb-2">
            <ul class="pagination d-inline-flex">
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span>&lsaquo;</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a></li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a></li>
                @else
                    <li class="disabled"><span>&rsaquo;</span></li>
                @endif
            </ul>
        </div>

        {{-- Форма выбора элементов на странице, справа --}}
        <div class="d-flex justify-content-end">
            <form method="get" action="{{ url('restaurants') }}" class="per-page-form">
                <span>Элементов на странице:</span>
                <select name="perpage">
                    <option value="2" @if($paginator->perPage() == 2) selected @endif>2</option>
                    <option value="3" @if($paginator->perPage() == 3) selected @endif>3</option>
                    <option value="4" @if($paginator->perPage() == 4) selected @endif>4</option>
                </select>
                <input type="submit" value="Изменить">
            </form>
        </div>
    </div>
@endif
