<?php

namespace App\Models;

use App\Models\Groupe;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_ROLE = "USER";
    const ADMIN_ROLE = "ADMIN";

    const ACTIVE_STATUS="ACTIVE";
    const INACTIVE_STATUS="INACTIVE";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'nom',
        'prenom',
        'nomar',
        'prenomar',
        'telephone',
        'image',
        'role',
        'status',
        'groupe_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }
}
