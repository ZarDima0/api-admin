@extends('layouts.app')

@section('content')
    {{--    @dd($userGenreList['users'])--}}
    <div class="container">
        <h1>Добавить книгу</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('books.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Название книги</label>
                <input name = 'name_books'  class="form-control"   placeholder="Название книги">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание книги</label>
                <textarea name = 'description'  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="inputDate">Год выпуска</label>
                <input name = 'year' type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputUser">Выбрать автора</label>
                <select name="author_id" id="inputUser" class="form-control">
                    @foreach($userGenreList['users'] as $user)
                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inputGenres">Выбрать жанры</label>
                <select name="genres_id" id="inputState" class="form-control">
                    @foreach($userGenreList['genres'] as $genre)
                        <option value="{{ $genre['id'] }}" >{{ $genre['genres'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
