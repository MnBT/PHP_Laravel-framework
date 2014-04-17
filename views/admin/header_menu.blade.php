@section('header')
<ul class="nav nav-pills" style='margin-top: 15px;'>
    @foreach ($types as $type)
    @if ($type->id == @$cur_type)
    <li class='active'>
        <a href="{{ URL::to('admin') }}/products/{{ $type->id }}">{{ $type->name }}</a>
    </li>
    @else
    <li>
        <a href="{{ URL::to('admin') }}/products/{{ $type->id }}">{{ $type->name }}</a>
    </li>
    @endif
    @endforeach
    <li><a href="{{ URL::to('/admin/type/add') }}" style='color: #18C51F;'>Добавить категорию</a></li>
    <li class="logout"><a href="{{ URL::to('logout') }}">Выйти</a></li>

</ul>
@stop