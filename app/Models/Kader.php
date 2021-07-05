<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;

class Kader extends Model
{
    protected $table = 'kaders';
    protected $guarded = [];
    
    use HasFactory, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_telepon',
        'is_verified'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function kriteria()
    {
        return $this->hasMany('App\Models\Kriteria');
    }
}
