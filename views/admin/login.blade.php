@extends('admin.layout')

@section('header')

@stop

@section('content')
<form class="form-horizontal" action='login' method='post'>
    <div class="control-group">
        <label class="control-label" for="login">Логин:</label>
        <div class="controls">
            <input type="text" name="login" id='login' placeholder="Логин">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Пароль:</label>
        <div class="controls">
            <input type="password" name="password" id='password' placeholder="Пароль">
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Войти</button>
        </div>
    </div>
</form>

@stop
