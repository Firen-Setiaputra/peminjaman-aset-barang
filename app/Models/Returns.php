<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','loans_id','tanggal_pengembalian'
    ];

    public function loans()
    {
        return $this->belongsTo(loans::class,'loans_id');
    }
}
