@extends('layouts.app')

@section('content')
<!-- <div class="row">
    <div class="col-sm-8 offset-sm-2"> -->
<h1 class="display-3">Каллендарь событий для компании: {{ $companyName }}</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">
                <p>Неделя {{ $days[0]->weekOfMonth }} </p>
                <p class="text-uppercase">{{ Date::parse($days[0])->format('F') }} </p>

            </th>
            @foreach($days as $day)
                <th scope="col">{{ Date::parse($day)->format('D, d M.') }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($eventsByShift as $shift)
            <tr>
                <th scope="col">
                    <div style="transform: rotate(-90deg);">{{ $shift['shift']->name }}</div>
                </th>
                @foreach($shift['events'] as $event)
                    @if($event !== null)
                        <td scope="col">
                            <div class="card" style="width: 14rem; height: 12rem">
                                <div class="card-body">
                                    <p class="font-weight-bold">{{ $event->name }}</p>
                                    <p>{{ $event->price }}</p>
                                    <p>{{ $event->work_type }}</p>
                                    <p>{{ $event->employee->name }}</p>
                                </div>
                            </div>
                        </td>
                    @else
                        <td scope="col" style="opacity: 0">
                            <div class="card" style="width: 14rem; height: 12rem">
                                <div class="card-body">
                                </div>
                            </div>
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
