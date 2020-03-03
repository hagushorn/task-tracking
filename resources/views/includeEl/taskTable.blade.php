<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Название</th>
      <th scope="col">Исполнитель</th>
      <th scope="col">Статус</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
        @foreach($dataTask as $val)
        <tr>
            <th scope="row">{{ $val->id }}</th>
            <td>{{ $val->title }}</td>
            @foreach($data as $valEx)
              @if($valEx->id == $val->idExecutor)
                <td>{{ $valEx->name }}</td>
              @endif
            @endforeach
            <td>{{ $val->status }}</td>
            <td><a href="">Редактировать</a> / 
            <a href="">удалить</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTask">Добавить</button>
</div>