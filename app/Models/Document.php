<?php

namespace App\Models;

use App\Models\Folder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    public function dateFormatted(){
        return date_format($this->created_at, 'd-m-Y ');
    }
    
    

    protected $fillable = [
        'designation',
        'description',
        'file',
        'type',
        'folder_id',
        'user_id'
    ];


    public function formatBytes($fileSize, $precision = 2)
    {
      $fileSize = File::size(public_path('documents/'.$this->file.''));
      $base = log($fileSize, 1024);
      $suffixes = array('', 'K', 'M', 'G', 'T');   
      
      return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    
    
    public function folder(){
        return $this->belongsTo(Folder::class);
    }
}
