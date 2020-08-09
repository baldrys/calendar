@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Получение информации по событиям</h1>
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
      <form method="post" action="{{ route('companyEvents')}}">
          @csrf
          <div class="form-group">
              <label for="start_date">Дата начала: </label>
              <input type="date" class="form-control" name="start_date"/>
              <label for="end_date">Дата конца:</label>
              <input type="date" class="form-control" name="end_date"/>



              <label for="company_id">Компания:</label>
              <select name="company_id" class="custom-select">
                @foreach($companies as $company)
                  <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>

          </div>

          <button type="submit" class="btn btn-primary">Отправить</button>
      </form>
  </div>
</div>
</div>
@endsection
