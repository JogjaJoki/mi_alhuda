<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'NIP',
        'photo',
        'address',
        'phone'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
