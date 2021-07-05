<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = [];
    use HasFactory, Notifiable, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'role',
        'kader_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kader()
    {
        return $this->belongsTo('App\Models\Kader');
    }

    public function isAdmin()
    {
        if ($this->role == "administrator") return true;
        return false;
    }
}
