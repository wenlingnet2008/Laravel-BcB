<?php

namespace App\Models;

use App\Traits\BaseCategoryTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $primaryKey = 'catid';
    public $timestamps = false;
    protected $category_name = 'name';

    protected $fillable = ['name'];

    /**
     * 分类模型 和 品牌模型， 系列模型 都存在多对多的关系 ，所以使用多态关联, 建立一张中间表即可
     *
     * 使用 belongsToMany ，这个 需要建立多张 中间表
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function brands(){
        //使用多对多 多态关联
        return $this->morphedByMany('App\Models\Brand', 'categoryable', 'categoryables', 'catid');
        //return $this->belongsToMany(Brand::class, 'mapping_brand_category', 'catid', 'brandid');
    }

    public function series(){
        return $this->morphedByMany('App\Models\Series', 'categoryable', 'categoryables', 'catid');
        //return $this->belongsToMany('App\Models\Series', 'mapping_series_category', 'catid', 'serid');
    }


    public function saveCategory(){
        $this->linkurl = str_slug($this->name);
        $this->letter = ucfirst(mb_substr($this->name, 0, 1));
        $this->save();
    }

}
