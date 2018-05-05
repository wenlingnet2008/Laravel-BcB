<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BrandCategory extends Pivot
{
    protected $table = 'mapping_brand_category';


    public $timestamps = false;

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brandid', 'brandid');
    }

    public function categores(){
        return $this->belongsTo('App\Models\Category', 'catid', 'catid');
    }
}
