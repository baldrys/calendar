<?php

namespace App\Http\Controllers;

use App\CompanyModel;
use App\EventModel;
use App\ShiftModel;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class CompanyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $companyId = $request->company_id;
        $from = $request->start_date;
        $to = $request->end_date;
        $days = CarbonPeriod::create($from, $to)->toArray();
        $shifts = ShiftModel::all();
        $eventsByShift = $shifts->map(function ($shift) use ($days, $companyId) {
            return [
                'shift' => $shift,
                'events' => collect($days)->map(function ($day) use ($shift, $companyId) {
                    return EventModel::where('company_id', $companyId)
                        ->where('date', $day->toDateString())
                        ->where('shift_id', $shift->id)
                        ->first();
                }),
            ]
            ;
        });
        $companyName = CompanyModel::find($companyId)->name;
        return view('companies.events.index', compact('eventsByShift', 'days', 'shifts', 'companyName'));
    }
}
