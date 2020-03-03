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
                            <select class="custom-select" name = "idExecutor" id="inputGroupSelect01">
                                @foreach($data as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Статус</label>
                            <select class="custom-select" name = "status" id="inputGroupSelect01">
                                <option selected>Открыта</option>
                                <option value="1">В работе</option>
                                <option value="2">Завершена</option>
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
    @include('includeEl.taskTable')

@endsection

@section('ajax')
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
                    success:function(response)
                    {
                        console.log(response);
                        $('#addTask').modal('hide');
                        $('.table>tbody').empty();
                    },
                    error:function(error)
                    {
                        console.log(error);
                        alert("Задача не добавлена");
                    }
                });
            });

        });
</script>
@endsection
