<ul class="list-group">
    @if(empty($poisk))
        Запрос пуст
    @else
        @foreach($search as $item)
        {{$item->name}}
            @foreach($item as $find)
                @if(substr_count($find,$poisk) > 0)
                <li class="list-group-item border-0 px-0">
                    <i class="bi bi-search text-muted me-2"></i>
                    <a href="#" class="text-dark text-decoration-none">{{$item->name}}</a>
                </li>
                @endif
            @endforeach
        @endforeach
    @endif
</ul>