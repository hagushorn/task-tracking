@extends('layouts.layout')

@section('title')Исполнители @endsection

@section('content')
    @include('includeEl.headerEx')

<table class="table table-bordered ">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Имя</th>
            <th scope="col">Должность</th>
            <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <th scope="row">{{ $val->id }}</th>
            <td>{{ $val->name }}</td>
            <td>{{ $val->post }}</td>
            <td><a href="{{ route('executor-edit',$val->id) }}">Редактировать</a> / 
            <a href="{{ route('executor-delete',$val->id) }}">удалить</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <a class="btn btn-success" href = "{{ route('executorAdd') }}">Добавить</a>
</div>
@endsection