<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'parent_id',
        'position',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function getPositionLabelAttribute()
    {
        if ($this->position == null) {
            return 'N/A';
        } else  {
            return ucfirst($this->position);
        }
        // if ($this->position == null) {
        //     return 'N/A';
        // } else if ($this->position == 'right') {
        //     return 'Right';
        // } else if ($this->position == 'left') {
        //     return 'Left';
        // } else if ($this->position == 'bottom') {
        //     return 'Bottom';
        // }
    }
}
