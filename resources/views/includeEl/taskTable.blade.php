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
            <td>{{ $val->executors()->pluck('name')->implode(', ') }}</td>
            <td>{{ $val->status }}</td>
            <td><a href="{{ route('tasks-edit',$val->id) }}">Редактировать</a> / 
            <a href="" data-id="{{ $val->id }}" data-token="{{ csrf_token() }}" class="deleteEl" >удалить</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
