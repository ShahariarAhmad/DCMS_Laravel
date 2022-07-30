<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public function history_options()
    {
        return $this->hasMany(History_option::class);
    }

    public function history_answers()
    {
        return $this->hasMany(History_answer::class);
    }
}
