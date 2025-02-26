<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    /** @use HasFactory<\Database\Factories\LoansFactory> */
    use HasFactory;

    protected $fillable = [
        'id','anggota_id','asset_id','tanggal_peminjaman','tanggal_pengembalian','status'
    ];

    public function anggota ()
    {
        return $this->belongsTo(Anggota::class,'anggota_id');
    }

    public function asset ()
    {
        return $this->belongsTo(Asset::class,'asset_id');
    }
}
