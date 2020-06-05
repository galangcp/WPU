<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_mahasiswa';
    protected $table = 'Mahasiswa';
    protected $fillable = ['nama', 'alamat', 'no_hp'];
}
