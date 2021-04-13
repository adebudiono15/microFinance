<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class JenisPendapatan extends Model
{
    USE HasFactory;
    protected $table = 'jenis_pendapatan';
    protected $fillable = ['id','nama_jenis_pendapatan'];
}
