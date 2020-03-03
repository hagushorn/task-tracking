@extends('layouts.layout')

@section('title')Добавление исполнителя @endsection

@section('content')
@include('includeEl.headerEx')
<form action="{{ route('executorAdd') }}" method="post">
    <div class="input-group mb-3">
        <div class="d-flex flex-column">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Имя</span>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Должность</span>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>
    <a href="{{ route('executor') }}" class="btn btn-danger">Отмена</button>  
</form>
@endsection