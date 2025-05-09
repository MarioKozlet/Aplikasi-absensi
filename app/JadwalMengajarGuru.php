<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalMengajarGuru extends Model
{
    //
    protected $table = 'jadwal_mengajar_gurus';
    protected $fillable = ['guru_id', 'kelas_id', 'mapel_id', 'hari', 'jam_mulai', 'jam_selesai'];
    public function guru()
    {
        return $this->belongsTo('App\Guru', 'guru_id');
    }
    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }
    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }
}
