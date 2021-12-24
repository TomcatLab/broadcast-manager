@if(isset($breadcrumb))
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        @foreach($breadcrumb as $item)
            @if(isset($item[1]))
                <li class="breadcrumb-item">
                    <a href="{{url($item[1])}}">{{$item[0]}}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{$item[0]}}</li>
            @endif
        @endforeach
    </ol>
</nav>
@endif