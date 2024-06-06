<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['NIM','NAMA','TANGGALLAHIR','JURUSAN','ALAMAT'];
    protected $table='siswa';
    public $timestamps = false;
}
