<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function infogram() {
        return view('infogram');
    }

    public function indexuser() {

        $saldo = DB::table('members')->where('user_id', Auth::user()->id)->first()->balance;
        $data['saldo'] = $saldo;

        return view('home_user', compact('data'));
    }
}
