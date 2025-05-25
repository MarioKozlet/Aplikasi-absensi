<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasPeserta extends Model
{
    protected $table = 'table_kelas_ajar';
    protected $guarded = ['id'];
}
