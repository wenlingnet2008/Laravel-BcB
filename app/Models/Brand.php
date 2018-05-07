<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'brandid';
    public $timestamps = false;

    public function series(){
        return $this->hasMany('App\Models\Series', 'brandid', 'brandid');
    }

    public function models(){
        return $this->hasMany('App\Models\ModelNumber', 'brandid', 'brandid');
    }

    public function categories(){
        return $this->morphToMany('App\Models\Category', 'categoryable', 'categoryables', null, 'catid');
        //return $this->belongsToMany('App\Category', 'mapping_brand_category', 'brandid', 'catid');
    }

    public function saveBrand(){
        $this->linkurl = str_slug($this->name);
        $this->letter = ucfirst(substr($this->name, 0, 1));
        $this->letter = preg_match('/[a-zA-Z]/', $this->letter) ? $this->letter : 0;
        $this->save();

    }


}
