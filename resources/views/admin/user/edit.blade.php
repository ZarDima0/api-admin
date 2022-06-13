@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Изменить</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('user.update',['user'=> $oneUserEdit->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="exampleInputEmail1">Введите полное имя автора</label>
            <input name = 'name'  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Полное имя" value = "{{$oneUserEdit->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input name = 'email' type="Email" class="form-control" id="exampleInputPassword1" placeholder="Email" value = "{{$oneUserEdit->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Город в котором родился</label>
            <input name= 'sity' class="form-control" id="exampleInputPassword1" placeholder="Город" value = "{{$oneUserEdit->sity}}">
        </div>
        <div class="form-group">
            <label for="inputDate">Введите дату:</label>
            <input name = 'birth_date' type="date" class="form-control" value = "{{$oneUserEdit->birth_date}}" >
         </div>
         <div class="form-group">
            <label for="exampleFormControlTextarea1">Об авторе</label>
            <textarea name = 'description'  class="form-control" id="exampleFormControlTextarea1"rows="3">{{$oneUserEdit->description}}</textarea>
        </div> 
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
