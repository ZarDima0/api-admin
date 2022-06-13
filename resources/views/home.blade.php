@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Администраторы</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Роль</th>
            <th scope="col">Дата регистрации</th>
            </tr>
        </thead>
    <tbody>
        @foreach($adminList as $admin) 
        <tr>
            <th scope="row">{{$admin->id}}</th>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->role->role_name}}</td>
                <td>{{date("d.m.Y", strtotime($admin->created_at)) }}</td>
                <td><a href="">Изменить</a></td>
                <td><a href="">Удалить</a></td>
             </tr>
        <tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
