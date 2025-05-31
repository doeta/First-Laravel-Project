<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = ['age', 'bio','user_id' ];
    
    // Relasi ke model Genre
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
}
