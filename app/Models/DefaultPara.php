<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultPara extends Model
{
    protected $primaryKey = 'dpid';

    public $timestamps = false;

    public function values(){
        return $this->hasMany('App\Models\DefaultParaValue', 'dpid');
    }
}
