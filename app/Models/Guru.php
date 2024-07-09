<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'guru';
    protected array $guard_name = ['api', 'web'];

    protected $fillable = [
        'NIP',
        'name',
        'email',
        'password'
    ];
}
