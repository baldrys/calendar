@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Обновление события</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('events.update', $event->id) }}">
            @method('PATCH') 
            @csrf

            <div class="form-group">    
              <label for="name">Название проекта:</label>
              <input type="text" class="form-control" name="name" value= "{{$event->name}}"/>
              <label for="price">Цена:</label>
              <input type="number" class="form-control" name="price" value= "{{$event->price}}"/>
              <label for="work_type">Тип работ:</label>
              <input type="text" class="form-control" name="work_type" value= "{{$event->work_type}}"/>

              <label for="company_id">Компания:</label>
              <select name="company_id" class="custom-select">
                <!-- <option value="{{ $event->company->id }}">{{ $event->company->name }}</option> -->
                @foreach($companies as $company)
                  <option value="{{ $company->id }}" {{$event->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
              </select>
              <label for="employee_id">Сотрудник:</label>
              <select name="employee_id" class="custom-select">
                <!-- <option value="{{ $event->employee->id }}">{{ $event->employee->name }}</option> -->
                @foreach($employees as $employee)
                  <option value="{{ $employee->id }}" {{$event->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
              </select>
              <label for="date">Дата:</label>
              <input type="date" class="form-control" name="date" value= "{{$event->date}}"/>
              <label for="shift_id">Сотрудник:</label>
              <select name="shift_id" class="custom-select">
                <!-- <option value="{{ $event->shift->id }}">{{ $event->shift->name }}</option> -->
                @foreach($shifts as $shift)
                  <option value="{{ $shift->id }}" {{$event->shift_id == $shift->id ? 'selected' : '' }}>{{ $shift->name }}</option>
                @endforeach
              </select>
          </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
</div>
@endsection