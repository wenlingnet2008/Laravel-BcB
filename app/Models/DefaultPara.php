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

    public function category(){
        return $this->belongsTo('App\Models\Category', 'catid', 'catid');
    }
}
