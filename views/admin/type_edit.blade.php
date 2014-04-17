@extends('admin.layout')

@section('header')
@parent
@stop

@section('content')
<div class='product_form'>
    {{ Form::open(array('url' => 'admin/type/edit/'.$type->id,'method' => 'post')) }}
    @if (isset($error))
    <div class="alert alert-error">
        {{ $error }}
    </div>
    @endif
    <div>
        {{ Form::text('type_name',@$type->name,array('placeholder' => 'Название категории')) }}
    </div>
    {{ Form::submit('Сохранить',array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>

@stop