@if ($paginator->hasPages())
    <ul class="pagination">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="{{$page== 1 ? 'active' : ''}}"><a class="paginate-item page-item " href="{{ $url }}">{{ $page }}</a></li>
                @endforeach
            @endif
        @endforeach        
    </ul>
@endif 