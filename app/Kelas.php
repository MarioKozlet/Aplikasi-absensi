<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'table_kelas';
    protected $fillable = ['kode_kelas', 'nama_kelas', 'tingkat_kelas', 'jurusan_kelas', 'wali_kelas'];

    public function guru()
    {
        return $this->belongsTo('App\Guru', 'wali_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'jurusan_kelas');
    }
}
