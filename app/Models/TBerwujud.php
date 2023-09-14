<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBerwujud extends Model
{
    use HasFactory;

    protected $table = 'tberwujud';

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'lokasi',
        'keadaan',
        'masa_pemakaian',
        'tanggal_terima',
        'Nilai',
        'status',
        'keterangan',
    ];
}
