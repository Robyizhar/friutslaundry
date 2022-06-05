<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Harga;
use Yajra\DataTables\Facades\DataTables;

class KasirController extends Controller
{
    public function index() {
        return view('transaksi.kasir.form');
    }

    public function getDataLayanan(Request $request) {
        // return $request;
        $data = Harga::where('kategori', $request->kategori);
        return DataTables::of($data)

        ->addColumn('action', function ($data) {
            return view('component.action', [
                'model' => $data,
                'url_edit' => route('harga.edit', $data->id),
                'url_detail' => route('harga.detail', $data->id),
                'url_destroy' => route('harga.destroy', $data->id)
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action', 'roles'])
        ->make(true);
    }

    public function store(Request $request) {
        return $request;
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
