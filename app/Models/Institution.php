<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    use HasFactory;
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
