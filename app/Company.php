<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    protected $table = 'companies';

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User', 'user_company',
            'user_id', 'company_id');
    }
}
