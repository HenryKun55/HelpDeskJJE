<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitation;

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
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request) {
   		$data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->paginate(5);
   		return view('home',compact('data'))
   			->with('i', ($request->input('page', 1) - 1) * 5);
   	}
}
