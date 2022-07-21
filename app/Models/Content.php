<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
