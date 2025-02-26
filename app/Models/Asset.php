<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory;

    protected $fillable = [
        'id','kode_asset','nama_asset','kategori','stock','deskripsi','status'
    ];

    public function loans ()
    {
        return $this->hasMany(loans::class,'loans_id');
    }
}
