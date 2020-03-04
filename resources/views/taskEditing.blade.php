@extends('layouts.layout')

@section('title')Редактирование @endsection

@section('content')
@include('includeEl.header')
<form action="{{ route('task-update',$data->id) }}" method="post">
    @csrf
    <div class="input-group mb-3">
        <div class="d-flex flex-column">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                <input type="text"name="title" value="{{ $data->title }}" id="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Исполнитель</label>
                <select multiple class="custom-select" name = "idExecutor[]" id="inputGroupSelect01">
                    @foreach($dataEx as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Статус</label>
                <select class="custom-select" name = "status" id="inputGroupSelect01">
                    <option selected>Открыта</option>
                    <option value="В работе">В работе</option>
                    <option value="Завершена">Завершена</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
    <a href="/" class="btn btn-danger">Отмена</a>  
</form>
@endsection