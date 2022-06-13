@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить жанр</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('genre.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Введите полное имя автора</label>
            <input name = 'genre'  class="form-control"   placeholder="Введите новый жанр">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
