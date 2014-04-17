@extends('admin.layout')

@section('header')
@stop

@section('content')
@if (isset($error))
<div class="alert alert-error">
    {{ $error }}
</div>
@endif
<form class="form-horizontal" action='change_pass' method='POST'>
    <div class="control-group">
        <label class="control-label" for="old_password">Старый пароль:</label>
        <div class="controls">
            <input type="text" id="old_password" name="old_password" placeholder="Старый пароль">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="new_password">Новый пароль:</label>
        <div class="controls">
            <input type="password" id="new_password" name='new_password' placeholder="Новый пароль">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="repl_password">Повторите пароль:</label>
        <div class="controls">
            <input type="password" id="repl_password" name='repl_password' placeholder="Повторите пароль">
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Изменить</button>
        </div>
    </div>
</form>
@stop
