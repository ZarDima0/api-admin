@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Список жанров</h1>
    @if ($message = session('success'))
    <div class="alert alert-primary">
        <h3>{{$message}}</h3>
    </div>
    @endif

    @if(isset($genresList[0]->id))
    <a href="{{route('genre.create')}}">
        <button class = 'btn btn-primary'>Добавить</button>
    </a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Дата регистрации</th>
            </tr>
        </thead>
    <tbody>
        @foreach($genresList as $genre) 
        <tr>         
                <th scope="row">
                    <a href="{{ route('genre.show', ['genre' => $genre->id]) }}">{{$genre->id}}</a>
                </th>
                <td >{{$genre->genres}}</td>
                <td>{{date("d.m.Y", strtotime($genre->created_at)) }}</td>
                <td>
                    <a href="{{ route('genre.edit', ['genre' => $genre->id]) }}">
                        <button class = 'btn btn-primary'>
                            Изменить
                        </button>
                    </a>
                </td>
                <td>
                    <form action="{{route('genre.destroy',['genre' => $genre->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="text" style = 'display:none' value = '{{$genre->id}}'>
                        <button class = 'btn btn-danger' type="submit">
                            Удалить
                        </button>
                    </form>
                </td>
             </tr>
        <tr>
        @endforeach
    </tbody>
    </table>
    @else
    <a href="{{route('genre.create')}}">
        <button class = 'btn btn-primary' >Добавить жанр</button>
    </a>
    @endif
    {{ $genresList->links('vendor.pagination.simple-bootstrap-4')}}
</div>

@endsection
