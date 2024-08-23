<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';

    protected $fillable = [
        'id',
        'kode_pelajaran',
        'NIS',
        'nilai'
    ];

    public function pelajaran(){
        return $this->belongsTo(Pelajaran::class, 'kode_pelajaran');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'NIS');
    }

    public function getKelasID(){
        return $this->siswa->kelas->id;
    }
}
