<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermintaanLaundryRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            
        ];
    }

    public function messages() {
        return [
            'member_id.required'  => 'member harus diisi',
            'tanggal.required'  => 'tanggal harus diisi',
            'jam.required'      => 'jam harus diisi',
            'alamat.required'   => 'alamat harus diisi',
        ];
    }
}
