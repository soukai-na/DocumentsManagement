<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom','description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'groupe_user', 'groupe_id', 'user_id');
    }
}
