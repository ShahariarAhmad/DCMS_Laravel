<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sick extends Model
{
    use HasFactory;

    public function sick_users()
    {
    return $this->hasMany(Role::class);
    }

    public function permissions()
    {
    return $this->hasMany(Role::class);
    }
}


