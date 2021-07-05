<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;
use DB;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use HasFactory, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'objek_kriteria_id',
        'kader_id',
        'nilai'
];

    public function kader()
    {
        return $this->belongsTo('App\Models\Kader');
    }

    public function objekKriteria()
    {
        return $this->belongsTo('App\Models\ObjekKriteria');
    }

    public static function getRowByKaderId($kader_id = null)
    {
        $kriteria = Kriteria::select(DB::raw('kader_id, group_concat(objek_kriteria_id) as obj_id, group_concat(nilai) as nilais'))
                                    ->groupBy('kriterias.kader_id')                        
                                    ->get();
                                    
        foreach($kriteria->toArray() as $a){
            $objek = explode(',', $a['obj_id']);
            $nilai = explode(',', $a['nilais']);
            for($i=0; $i<count($objek); $i++) $result[$a['kader_id']][$objek[$i]] = $nilai[$i];
        }

        if(!is_null($kader_id)) return $result[$kader_id];        
        return $result;
    }
}
