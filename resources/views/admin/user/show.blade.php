@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{$oneUser->name}}</h3>
            <p>Дата Рождения: {{$oneUser->birth_date}}</p>
            <p>Город: {{$oneUser->sity}}</p>
            <p>Добавлен:{{$oneUser->created_at}}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Описание</h5>
            <p class="card-text">{{$oneUser->description}}</p>
        </div>
    </div>
</div>
@endsection
