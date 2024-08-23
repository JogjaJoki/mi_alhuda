<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_pelajaran';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'pelajaran';

    protected $fillable = [
        'kode_pelajaran',
        'nama',
        'bobot'
    ];

    public function guru(){
        return $this->belongsToMany(Pelajaran::class, 'guru_pelajaran', 'kode_pelajaran', 'user_id');
    }
}
