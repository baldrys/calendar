<?php

namespace App\Http\Controllers;

use App\CompanyModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $companyModel;
        // dd($companyModel);
        $companies = CompanyModel::all();
        return view('index', compact('companies'));
    }
}
