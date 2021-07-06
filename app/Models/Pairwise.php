<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;

class Pairwise extends Model
{
    protected $table = 'pairwises';
    protected $guarded = [];
    use HasFactory, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bobot',
        'from_kriteria',
        'to_kriteria'
    ];

    public function fromObjekKriteria()
    {
        return $this->belongsTo('App\Models\ObjekKriteria', 'from_kriteria');
    }

    public function toObjekKriteria()
    {
        return $this->belongsTo('App\Models\ObjekKriteria', 'to_kriteria');
    }

    public static function getPairwisematrixes()
    {
        $pairwises = Self::all();
        // $matrixValue[] = [];
        foreach ($pairwises as $pairwise) {
            $matrixValue[$pairwise->from_kriteria][$pairwise->to_kriteria] = $pairwise->bobot;
            // $matrixValue[$pairwise->fromObjekKriteria->name][$pairwise->toObjekKriteria->name] = $pairwise->bobot;
        }
        return $matrixValue;
    }
}
