@extends('layouts.layout')

@section('title') Главная страница @endsection

@section('content')
    @include('includeEl.header')
    @include('includeEl.taskTable')
@endsection
