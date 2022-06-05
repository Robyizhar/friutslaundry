<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ExpedisiJemputRequest;
use App\Http\Requests\ExpedisiJemputRequestUpdate;
use App\Models\ExpedisiJemput;
use App\Models\Member;
use App\Repositories\BaseRepository;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use DB;

class ExpedisiJemputController extends Controller {

    protected $model, $role;

    public function __construct(ExpedisiJemput $expedisijemput) {
        $this->model = new BaseRepository($expedisijemput);
        $this->middleware('auth');
    }

    public function index() {
        return view('transaksi.expedisi-jemput.index');
    }

    public function getData() {
        //belum difilter untuk orang yg menjemput
        $data = DB::table('permintaan_laundries')
        ->select('permintaan_laundries.*', 'users.name')
        ->join('members', 'members.id', '=', 'permintaan_laundries.member_id')
        ->join('users', 'users.id', '=', 'members.user_id')
        ->whereNull('permintaan_laundries.deleted_at')
        ->orderBy('permintaan_laundries.tanggal', 'ASC')
        ->orderBy('permintaan_laundries.waktu', 'ASC')
        ->get();
        return DataTables::of($data)

        ->addColumn('action', function ($data) {
            return view('component.action', [
                'model' => $data,
                'url_edit' => route('expedisi-jemput.edit', $data->id),
                'url_detail' => route('expedisi-jemput.detail', $data->id)
                // 'url_destroy' => route('expedisi-jemput.destroy', $data->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'roles'])
        ->make(true);
    }

    // public function create() {
    //     try {
    //         $roles = Role::where('name', '!=', 'Maintener')->pluck('name','id');
    //         return view('transaksi.expedisi-jemput.form', compact('roles'));
    //     } catch (\Throwable $e) {
    //         Alert::toast($e->getMessage(), 'error');
    //         return redirect()->route('top-up');
    //     }
    // }

    // public function store(ExpedisiJemputRequest $request) {
    //     try {
    //         $data = $request->except(['_token', '_method', 'id' ,'nama', 'nominal_old']);

    //         $expedisi-jemput = $this->model->store($data);

    //         DB::update('update members set balance = balance+'  .$request->nominal. ' where members.id= ' .$request->member_id);

    //         Alert::toast('Top Up '.$request->nama.' Berhasil Disimpan', 'success');
    //         return redirect()->route('top-up');
    //     } catch (\Throwable $e) {
    //         Alert::toast($e->getMessage(), 'error');
    //         return back();
    //     }
    // }

    public function edit($id) {
        try {
            $data['detail'] = DB::table('permintaan_laundries')
            ->select('permintaan_laundries.*', 'users.name')
            ->join('members', 'members.id', '=', 'permintaan_laundries.member_id')
            ->join('users', 'users.id', '=', 'members.user_id')
            ->where('permintaan_laundries.id',$id)
            ->get();

            return view('transaksi.expedisi-jemput.form', compact('data'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('expedisi-jemput');
        }
    }

    // public function detail($id) {
    //     try {
    //         $data['detail'] = $this->model->find($id);

    //         return view('transaksi.expedisi-jemput.detail', compact('data'));
    //     } catch (\Throwable $e) {
    //         Alert::toast($e->getMessage(), 'error');
    //         return redirect()->route('top-up');
    //     }
    // }

    // public function update(ExpedisiJemputRequestUpdate $request) {
    //     try {
    //         $data = $request->except(['_token', '_method', 'id', 'nama', 'nominal_old']);
    //         $user = $this->model->update($request->id, $data);
            
    //         $selisih = $request->nominal-$request->nominal_old;
    //         // echo($selisih);
    //         // exit();

    //         DB::update('update members set balance = balance+'  .(float)$selisih. ' where members.id= ' .$request->member_id);

    //         Alert::toast('Top Up '.$request->nama.' Berhasil Disimpan', 'success');
    //         return redirect()->route('top-up');
    //     } catch (\Throwable $e) {
    //         Alert::toast($e->getMessage(), 'error');
    //         return redirect()->route('top-up');
    //     }
    // }

    // public function destroy($id) {
    //     try {

    //         $data = $this->model->find($id);
    //         DB::update('update members set balance = balance-'  .(float)$data->nominal. ' where members.id= ' .$data->member_id);

    //         $this->model->softDelete($id);
            
    //         Alert::toast('ExpedisiJemput Kode '.$data->kode.' Berhasil Dihapus', 'success');
    //         return redirect()->route('top-up');
    //     } catch (\Throwable $e) {
    //         echo 'gagal';
    //         exit();
    //         Alert::toast($e->getMessage(), 'error');
    //         return redirect()->route('top-up');
    //     }
    // }

    // public function getDataMember() {
    //     $data = DB::table('members')
    //     ->select('members.*', 'users.name')
    //     ->join('users', 'users.id', '=', 'members.user_id')
    //     ->whereNull('members.deleted_at')
    //     ->orderBy('users.name', 'ASC')
    //     ->get();
        
    //     return DataTables::of($data)
    //     ->addIndexColumn()
    //     ->rawColumns(['action', 'roles'])
    //     ->make(true);
    // }
}
