<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelNumber extends Model
{
    protected $primaryKey = 'modelid';
    protected $table = 'models';

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brandid', 'brandid');
    }

    public function series(){
        return $this->belongsToMany('App\Models\Series', 'series_modelnumber', 'modelid', 'serid');
    }

    public function paras(){
        return $this->hasMany('App\Models\ModelPara', 'modelid', 'modelid');
    }

    public function content(){
        return $this->hasOne('App\Models\ModelData', 'modelid', 'modelid');
    }


    public function saveModel(){
        $this->linkurl = str_slug($this->name);
        $this->letter = ucfirst(substr($this->name, 0, 1));
        $this->letter = preg_match('/[a-zA-Z]/', $this->letter) ? $this->letter : 0;
        $this->save();
    }
}
