<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Pola, które mogą być masowo przypisywane
    protected $fillable = ['user_id', 'message'];

    // Relacja: Komentarz należy do użytkownika
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
