<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCommunications extends Model
{
    use HasFactory;
    protected $fillable = ['messages', 'user_id'];
    protected $table = 'users_communications';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}