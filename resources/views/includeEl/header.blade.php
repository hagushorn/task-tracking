<nav class="nav nav-pills nav-justified">
    <a class="nav-item nav-link active" href="/">Задачи</a>
    <a class="nav-item nav-link" href="{{ route('executor') }}">Исполнители</a>
    <form action="{{ route('search') }}" method="post" class="form-inline mt-2 mt-md-0">
    @csrf
        <input class="form-control mr-sm-2" name="title" type="text" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>
</nav>
