<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIS';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'siswa';

    protected $fillable = [
        'NIS',
        'id_kelas',
        'nama',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function nilai(){
        return $this->hasMany(Nilai::class, 'NIS');
    }
}
