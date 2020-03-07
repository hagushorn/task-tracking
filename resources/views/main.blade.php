@extends('layouts.layout')

@section('title') Главная страница @endsection

@section('content')
    @include('includeEl.header')
    <div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Добавление задачи</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="addForm">
         @csrf
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="d-flex flex-column">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                            <input type="text"name="title" id="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Исполнитель</label>
                            <select multiple class="custom-select" name = "idExecutor[]" id="inputGroupSelect01" required="">
                                @foreach($data as $val)
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <tr>
        <th></th>
    </tr>
    @include('includeEl.taskTable')
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTask">Добавить</button>
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
            url: "/delete"+id,
            type: "DELETE",
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token
            },
            success: function (message) {
                el.detach();
                alert(message.success);
            },
            error: function (msg) {
            alert('Ошибка');
            }

        });

    });
});
</script>

<!-- add new El -->
<script type="text/javascript">
        $(document).ready(function()
        {
            $('#addForm').on('submit',function(e)
            {
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"/taskAdd",
                    data:$('#addForm').serialize(),
                    success:function(data)
                    {
                        console.log(data);
                        let str = `<tr><th scope="row">${data.id}</th><td>${data.title}</td><td>
                        ${data.name}</td><td>${data.status}
                        </td><td><a href="/editing/${data.id}">Редактировать</a> / <a href="" data-id="${data.id}
                        "data-token="{{ csrf_token() }}" class="deleteEl" >удалить</a></td>`;
                        $('#addTask').modal('hide');
                        $('.table > tbody:last').append(str);
                    },
                    error:function(error)
                    {
                        console.log(error);
                    }
                });
            });

        });
</script>
@endsection
