<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    protected $table = 'countries';

    public $timestamps = false;

    public function company(){
        return $this->hasOne('App\Company');
    }

    public function scopeByName($query, $name){
        return $query->where('name', $name);
    }
}
