<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model

{
    protected $guarded = ['id'];
    use HasFactory;
    public function blog_category()
    {
    return $this->hasMany(User::class);
    }

    public function blog_tag()
    {
    return $this->hasMany(User::class);
    }

    public function tag_user()
    {
    return $this->hasMany(User::class);
    }
}

  

