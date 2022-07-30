<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public function history_options()
    {
        return $this->belongsToMany(History_option::class);
    }

    public function history_answers()
    {
        return $this->belongsToMany(History_answer::class);
    }
}
