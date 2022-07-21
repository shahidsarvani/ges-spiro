<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    
    public $path = "public/media/";

    protected $fillable = [
        'name',
        'file_type',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getMediaPath()
    {
        return $this->path;
    }
}
