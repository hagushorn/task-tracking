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
            <a href=""data-id="{{ $val->id }}" data-token="{{ csrf_token() }}" class="deleteEl">удалить</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <a class="btn btn-success" href = "{{ route('executorAdd') }}">Добавить</a>
</div>
@endsection
@section('ajax')
<script type="text/javascript">
$(document).ready(function()
{
    $('body').on('click','.deleteEl',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var token = $(this).data('token');
        var el = $(this).parents('tr');
        $.ajax({
            url: "/executor/delete"+id,
            type: "DELETE",
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token
            },
            success: function (data) {
                el.detach();
                alert("Запись удалена");
            },
            error: function (msg) {
            alert('Ошибка');
            }

        });

    });
});
</script>
@endsection
