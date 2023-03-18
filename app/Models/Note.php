<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'tags',
        'description',
    ];

    // user returns the user that created the note
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
