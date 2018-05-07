<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelData extends Model
{
    protected $primaryKey = 'modelid';
    public $timestamps = false;
    protected $table = 'models_data';
}
