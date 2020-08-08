<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftModel;

class ShiftController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = ShiftModel::all();

        return view('shifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shifts.create');
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
            'name'=>'required'
        ]);

        $shift = new ShiftModel([
            'name' => $request->get('name')
        ]);
        $shift->save();
        return redirect()->route('shifts.index')->with('success', 'Смена добавлена!');
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
        $shift = ShiftModel::find($id);
        return view('shifts.edit', compact('shift'));   
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
        $request->validate([
            'name'=>'required',
        ]);

        $shift = ShiftModel::find($id);
        $shift->name =  $request->get('name');
        $shift->save();

        return redirect()->route('shifts.index')->with('success', 'Смена обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = ShiftModel::find($id);
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', 'Смена удалена!');
    }
}
