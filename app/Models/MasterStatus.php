<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStatus extends Model
{
    use HasFactory;

    protected $table = 'master_status';
    public $timestamps = false;
    protected $fillable = ['status'];
}
