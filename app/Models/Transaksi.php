<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_transaksi',
        'kasir_id',
        'outlet_id',
        'nama',
        'alamat',
        'parfume',
        'no_handphone',
        'total',
        'bayar',
        'pembayaran',
        'note'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    public function TransaksiDetail() {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id', 'id');
    }

    public function outlet() {
        return $this->belongsTo('App\Models\Outlet', 'outlet_id', 'id');
    }
    // return $this->belongsTo('App\Models\TResultInspection', 'id', 'unit_inspenction_id');
}
