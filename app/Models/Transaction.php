<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function diet_requests()
    {
        return $this->hasMany(User::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function diet_records()
    {
        return $this->hasMany(Diet_record::class);
    }

    public function appointments()
    {
        return $this->hasMany(User::class);
    }

    public function attached_pre_made_diet_charts()
    {
        return $this->hasMany(User::class);
    }
}
