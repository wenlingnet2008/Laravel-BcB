<?php

namespace App\Models;

use App\Traits\BaseCategoryTrait;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use BaseCategoryTrait;

    protected $primaryKey = 'serid';
    public $timestamps = false;
    protected $category_name = 'name';

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brandid', 'brandid');
    }

    public function categories(){
        return $this->morphToMany('App\Models\Category', 'categoryable','categoryables', null, 'catid');
        //return $this->belongsToMany('App\Models\Category', 'mapping_series_category', 'serid', 'catid');
    }

}
