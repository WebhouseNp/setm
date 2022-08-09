@if ($paginator->hasPages())
<div class="paginations">
    <ul class="flex-wrap d-flex lab-ul justify-content-center">
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="d-none d-sm-block"><a href="#">{{ $element }}</a></li>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="d-none d-sm-block">
            <a href="{{ $url }}" class="active" disabled>{{ $page }}</a>
        </li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        {{-- <li>
            <a href="#">1</a>
        </li>
        <li class="d-none d-sm-block">
            <a href="#">2</a>
        </li>

        <li>
            <a class="dot">...</a>
        </li>
        <li class="d-none d-sm-block">
            <a href="#">9</a>
        </li>
        <li class="d-none d-sm-block">
            <a href="#">10</a>
        </li>
        <li>
            <a href="#">11</a>
        </li> --}}
        @endforeach
        @endif
        @endforeach
    </ul>
</div>
@endif
