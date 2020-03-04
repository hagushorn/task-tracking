@extends('layouts.layout')

@section('title')Добавление прошло успешно @endsection

@section('content')
    @include('includeEl.header')
    <h1>Операция выполнена</h1>
    <p>Запись обновлена </p>
    <a href="/" class="btn btn-primary">Вернуться на страницу задач</a>  
@endsection