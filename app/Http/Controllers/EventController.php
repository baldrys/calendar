<?php

namespace App\Http\Controllers;

use App\CompanyModel;
use App\EventModel;
use App\Rules\EventShiftExists;
use App\ShiftModel;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EventModel::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = CompanyModel::all();
        $employees = User::all();
        $shifts = ShiftModel::all();
        return view('events.create', compact('companies', 'employees', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'work_type' => 'required',
            'company_id' => 'required',
            'employee_id' => 'required',
            'date' => 'required|date',
            'shift_id' => ['required', new EventShiftExists($request->date, $request->shift_id, $request->company_id)],
        ]);

        $event = new EventModel($request->all());
        $event->save();
        return redirect()->route('events.index')->with('success', 'Событие добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventModel::find($id);
        $companies = CompanyModel::all();
        $employees = User::all();
        $shifts = ShiftModel::all();
        return view('events.edit', compact('event', 'companies', 'employees', 'shifts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = EventModel::find($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Событие обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EventModel::find($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Событие удалено!');
    }
}
