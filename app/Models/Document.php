<?php

namespace App\Models;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    public function dateFormatted(){
        return date_format($this->created_at, 'Y-m-d ');
    }

    protected $fillable = [
        'designation',
        'description',
        'file',
        'type',
        'folder_id',
        'user_id'
    ];

    public function folder(){
        return $this->belongsTo(Folder::class);
    }
}
