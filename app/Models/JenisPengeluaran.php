<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    USE HasFactory;
    protected $table = 'jenis_pengeluaran';
    protected $fillable = ['id','nama_jenis_pengeluaran'];
}
