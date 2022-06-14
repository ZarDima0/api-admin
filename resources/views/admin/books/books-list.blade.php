@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Список книг</h1>
        @if ($message = session('success'))
            <div class="alert alert-primary">
                <h3>{{$message}}</h3>
            </div>
        @endif

        @if(isset($booksList[0]->id))
            <a href="{{ route('books.create') }}">
                <button class = 'btn btn-primary'>Добавить</button>
            </a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Жанр</th>
                    <th scope="col">Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booksList as $book)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('books.show', ['book' => $book->id]) }}">{{$book->id}}</a>
                        </th>
                        <td >{{$book->name_books}}</td>
                        <td >{{$book->author->name}}</td>
                        <td >{{$book->genres->genres}}</td>
                        <td>{{date("d.m.Y", strtotime($book->created_at)) }}</td>
                        <td>
                            <a href="{{ route('books.edit', ['book' => $book->id]) }}">
                                <button class = 'btn btn-primary'>
                                    Изменить
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('books.destroy',['book' => $book->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="text" style = 'display:none' value = '{{$book->id}}'>
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
            <a href="{{ route('books.create') }}">
                <button class = 'btn btn-primary' >Добавить книгу</button>
            </a>
        @endif
{{--        {{ $genresList->links('vendor.pagination.simple-bootstrap-4')}}--}}
    </div>

@endsection
