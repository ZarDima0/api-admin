@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список авторов</h1>
    @if ($message = session('success'))
    <div class="alert alert-primary">
        <h3>{{$message}}</h3>
    </div>
    @endif

    @if(isset($userList[0]->id))
    <a href="{{route('user.create')}}">
        <button class = 'btn btn-primary'>Добавить</button>
    </a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Дата регистрации</th>
            </tr>
        </thead>
    <tbody>
        @foreach($userList as $user) 
        <tr>         
                <th scope="row">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}">{{$user->id}}</a>
                </th>
                <td >{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{date("d.m.Y", strtotime($user->created_at)) }}</td>
                <td>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                        <button class = 'btn btn-primary'>
                            Изменить
                        </button>
                    </a>
                </td>
                <td>
                    <form action="{{route('user.destroy',['user' => $user->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="text" style = 'display:none' value = '{{$user->id}}'>
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
    <a href="{{route('user.create')}}">
        <button class = 'btn btn-primary' >Добавить автора</button>
    </a>
    @endif
</div>
@endsection
