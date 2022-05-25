<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Member;
use App\Repositories\BaseRepository;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Auth;

class MemberController extends Controller
{
    protected $model, $user, $role;

    public function __construct(Member $member, User $user) {
        $this->model = new BaseRepository($member);
        $this->user = new BaseRepository($user);
        $this->middleware('auth');
    }

    public function index() {
        return view('master-data.member.index');
    }

    public function getData() {
        $data = Member::with('user')->get();
        return DataTables::of($data)

        ->addColumn('action', function ($data) {
            return view('component.action', [
                'model' => $data,
                'url_edit' => route('member.edit', $data->id),
                // 'url_detail' => route('member.detail', $data->id),
                'url_destroy' => route('member.destroy', $data->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'roles'])
        ->make(true);
    }

    public function create() {
        try {
            $roles = Role::where('name', '!=', 'Maintener')->pluck('name','id');
            return view('master-data.member.form', compact('roles'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('member');
        }
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $user = $request->except(['_token', '_method', 'id', 'phone', 'address', 'balance']);
            $user['password'] = Hash::make($request->password);
            $user['qr_code'] = Hash::make($request->password);
            $user['is_member'] = '1';
            $user_id = $this->user->store($user);

            $member = $request->except(['_token', '_method', 'id', 'email', 'password', 'name']);
            $member['created_by'] = Auth::user()->name;
            $member['user_id'] = $user_id->id;
            $member['balance'] = 0;
            $this->model->store($member);

            DB::commit();
            Alert::toast($request->name.' Berhasil Disimpan', 'success');
            return redirect()->route('member');
        } catch (\Throwable $e) {
            DB::rollback();
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }

    public function edit($id) {
        try {
            $data['detail'] = $this->model->find($id);
            return view('master-data.member.form', compact('data'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('member');
        }
    }

    public function detail($id) {
        try {
            $data['detail'] = $this->model->find($id);

            return view('master-data.member.detail', compact('data'));
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('member');
        }
    }

    public function update(Request $request) {
        try {
            $data = $request->except(['_token', '_method', 'id']);
            $user = $this->model->update($request->id, $data);
            Alert::toast($request->nama.' Berhasil Disimpan', 'success');
            return redirect()->route('member');
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('member');
        }
    }

    public function destroy($id) {
        try {
            $this->model->softDelete($id);
            Alert::toast($request->name.' Berhasil Dihapus', 'success');
            return redirect()->route('users');
        } catch (\Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return redirect()->route('users');
        }
    }
}
