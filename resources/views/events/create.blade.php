@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Добавьте событие</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('events.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Название проекта:</label>
              <input type="text" class="form-control" name="name"/>
              <label for="price">Цена:</label>
              <input type="number" class="form-control" name="price"/>
              <label for="work_type">Тип работ:</label>
              <input type="text" class="form-control" name="work_type"/>

              <label for="company_id">Компания:</label>
              <select name="company_id" class="custom-select">
                @foreach($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
              <label for="employee_id">Сотрудник:</label>
              <select name="employee_id" class="custom-select">
                @foreach($employees as $employee)
                  <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
              </select>
              <label for="date">Дата:</label>
              <input type="date" class="form-control" name="date"/>
              <label for="shift_id">Сотрудник:</label>
              <select name="shift_id" class="custom-select">
                @foreach($shifts as $shift)
                  <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                @endforeach
              </select>
          </div>
                      
          <button type="submit" class="btn btn-primary">Добавить</button>
      </form>
  </div>
</div>
</div>
@endsection