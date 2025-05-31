<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['film_id', 'user_id', 'content'];

    public function film()
    {
        return $this->belongsTo(film::class, 'film_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
