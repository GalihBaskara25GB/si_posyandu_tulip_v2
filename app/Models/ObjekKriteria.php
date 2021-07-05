<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;

class ObjekKriteria extends Model
{
    protected $table = 'objek_kriterias';
    protected $guarded = [];
    use HasFactory, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'keterangan'
    ];

    public function kriteria()
    {
        return $this->hasMany('App\Models\Kriteria');
    }

    public function pairwise()
    {
        return $this->hasMany('App\Models\Pairwise');
    }
}
