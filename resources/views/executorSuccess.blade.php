@extends('layouts.layout')

@section('title')Добавление прошло успешно @endsection

@section('content')
    @include('includeEl.headerEx')
    <h1>Операция выполнена</h1>
    <p>Пользователь добавлен </p>
    <a href="{{ route('executor') }}" class="btn btn-primary">Вернуться на страницу исполнителей</a>  
@endsection