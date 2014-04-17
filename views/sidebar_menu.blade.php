@section('sidebar_menu')
@parent
@if (count($types) > 1 )
<div class='sidebar_menu area'>
    <ul class="nav nav-pills nav-stacked">
        @foreach($types as $type)
        @if ($type->id == $cur_type)
        <li class='active'><a href='/{{ $type->id }}'>{{ $type->name }}</a></li>
        @else
        <li><a href='/{{ $type->id }}'>{{ $type->name }}</a></li>
        @endif
        @endforeach
    </ul>
</div>
@endif
@stop