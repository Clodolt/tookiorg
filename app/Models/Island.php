<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{

    use HasFactory;
    protected $table = 'islands'; //islands by default
    protected $primaryKey = 'id'; //id by default
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'ilvl',
        'mokokosTotal',
        'soulType',
        'islandType',
    ];

    public function users(){
        return $this->belongsToMany(Island::class)->withPivot('isFavorite', 'mokokosGotten', 'soulGotten');
    }
}


