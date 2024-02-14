<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sondage extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'programme_politique_id', 'rating'];

    public function getRatingTextAttribute()
    {
        return [
            1 => 'Satisfait',
            2 => 'Peu Satisfait',
            3 => 'Pas Satisfait',
            // ... autres options ...
        ][$this->rating];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}

