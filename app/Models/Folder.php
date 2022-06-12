<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;

    protected $fillable=[
        'designation','designationar','type','folder_id'
    ];

    public function folders(){
        return $this->hasMany(Folder::class);
    }
    public function folder(){
        return $this->belongsTo(Folder::class);
    }
}
