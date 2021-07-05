<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\Http\Traits\UsesUuid;

class Rangking extends Model
{
    protected $table = 'rangkings';
    protected $guarded = [];
    use HasFactory, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nilai_preferensi',
        'kader_id'
    ];

    public function kader()
    {
        return $this->belongsTo('App\Models\Kader');
    }

    public function getRank(){
        $collection = collect(Rangking::orderBy('nilai_preferensi', 'DESC')->get());
        $data       = $collection->where('id', $this->id);
        $value      = $data->keys()->first() + 1;
        return $value;
     }
}
