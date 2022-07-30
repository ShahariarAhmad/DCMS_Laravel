<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];










    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function tag_user()
    {
        return $this->hasOne(Role_user::class);
    }

    public function sick_users()
    {
        return $this->hasOne(Role_user::class);
    }


    public function roles()
    {
        return $this->belongsTo(Role::class,'id');
    }

    public function history_anwser()
    {
        return $this->hasOne(Role_user::class);
    }

    public function handlers()
    {
        return $this->hasOne(Role_user::class);
    }

    public function feedbacks()
    {
        return $this->hasOne(Role_user::class);
    }

    public function diet_records()
    {
        return $this->hasMany(Diet_record::class);
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function category_user()
    {
        return $this->hasMany(Category_user::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function attached_pre_made_diet_charts()
    {
        return $this->hasMany(Attached_pre_made_diet_chart::class);
    }
 
}
