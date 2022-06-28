<?php

namespace App\Models;


use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;

    public function dateFormatted(){
        return date_format($this->created_at, 'd-m-Y ');
    }

    protected $fillable=[
        'designation','designationar','type','folder_id'
    ];

    

    public function folders(){
        return $this->hasMany(Folder::class);
    }
    public function folder(){
        return $this->belongsTo(Folder::class);
    }
    public function documents(){
        return $this->hasMany(Document::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
