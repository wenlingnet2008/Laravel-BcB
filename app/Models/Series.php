<?php

namespace App\Models;

use App\Traits\BaseCategoryTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Series extends Model
{
    use NodeTrait;

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

    public function models(){
        return $this->belongsToMany('App\Models\ModelNumber', 'series_modelnumber', 'serid', 'modelid');

    }

    public function saveCategory(){
        $this->linkurl = str_slug($this->name);
        $this->letter = ucfirst(substr($this->name, 0, 1));
        $this->save();
    }

}
