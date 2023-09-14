<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJenis extends Model
{
    use HasFactory;

    protected $table = 'master_jenis';
    public $timestamps = false;
    protected $fillable = ['jenis'];
}
