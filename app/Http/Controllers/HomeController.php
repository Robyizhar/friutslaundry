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
        
        if(Auth::user()->is_member==1){

            $member_info        = DB::table('members')->where('user_id', Auth::user()->id)->first();
            
            $transaksi_terakhir = DB::table('transaksis')->select('transaksis.*')
                                    ->where('transaksis.member_id', $member_info->id)
                                    ->orderBy('created_at', 'desc')
                                    ->first();

            $history_transaksi  = DB::table('transaksis')->select('transaksis.*')
                                    ->where('transaksis.member_id', $member_info->id)
                                    ->orderBy('created_at', 'desc')
                                    ->first();
            

            $data['saldo']              = $member_info->balance;
            $data['history_transaksi']  = $history_transaksi;
            $data['transaksi_terakhir'] = $transaksi_terakhir;

            return view('home_user', compact('data'));    
        }else{
            return view('home');
        }
        
    }

    public function infogram() {
        return view('infogram');
    }

    public function laporan() {
        return view('laporan.index');
    }

    public function like($id) {
        
        $like =  DB::update("update transaksis set kepuasan_pelanggan = 'ya' where transaksis.id= " .$id);
                         
        return Response()->json($like);
    }

    public function dislike($id) {
        try {

            DB::update("update transaksis set kepuasan_pelanggan = 'tidak' where transaksis.id= " .$id);

            // Alert::toast('Top Up '.$request->nama.' Berhasil Disimpan', 'success');
            return redirect()->route('history-laundry');
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }

    public function netral($id) {
        try {

            DB::update("update transaksis set kepuasan_pelanggan = 'netral' where transaksis.id= " .$id);

            // Alert::toast('Top Up '.$request->nama.' Berhasil Disimpan', 'success');
            return redirect()->route('history-laundry');
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }

}
