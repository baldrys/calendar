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
    <h1 class="display-3">События</h1>
    <div>
    <a style="margin: 19px;" href="{{ route('events.create')}}" class="btn btn-primary">Добавить событие</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Название проекта</td>
          <td>Стоимость работ</td>
          <td>Тип работ</td>
          <td>Компания</td>
          <td>Ответственный сотрудник</td>
          <td>Дата</td>
          <td>Смена</td>
          <td colspan = 2>Действия</td>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}} </td>
            <td>{{$event->price}} </td>
            <td>{{$event->work_type}} </td>
            <td>{{$event->company->name}} </td>
            <td>{{$event->employee->name}} </td>
            <td>{{$event->date}} </td>
            <td>{{$event->shift->name}} </td>
            <td>
                <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Изменить</a>
            </td>
            <td>
                <form action="{{ route('events.destroy', $event->id)}}" method="post">
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