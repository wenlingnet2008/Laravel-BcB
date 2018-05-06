<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultParaValue extends Model
{
    protected $primaryKey = 'dvid';
    public $timestamps = false;

    public function para(){
        return $this->belongsTo('App\Models\DefaultPara', 'dpid', 'dpid');
    }
}
