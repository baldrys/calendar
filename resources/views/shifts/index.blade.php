@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Смены</h1>
    <div>
    <a style="margin: 19px;" href="{{ route('shifts.create')}}" class="btn btn-primary">Добавить смену</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Название</td>
          <td colspan = 2>Действия</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shifts as $shift)
        <tr>
            <td>{{$shift->id}}</td>
            <td>{{$shift->name}} </td>
            <td>
                <a href="{{ route('shifts.edit',$shift->id)}}" class="btn btn-primary">Изменить</a>
            </td>
            <td>
                <form action="{{ route('shifts.destroy', $shift->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
</div>
@endsection