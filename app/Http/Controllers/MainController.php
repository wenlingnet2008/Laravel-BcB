<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\DefaultPara;
use App\Models\DefaultParaValue;
use App\Models\Member;
use App\Models\ModelNumber;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $categories = Category::withDepth()->having('depth', 0)->with(['descendants'])->get();
        $data['categories'] = $categories;

        $brands = Brand::limit(10)->get();
        $data['brands'] = $brands;

        $paras = DefaultPara::with(['values'])->limit(10)->get();
        $data['paras'] = $paras;

        $companies = Member::with(['company'])->limit(10)->get();
        $data['companies'] = $companies;

        $models = ModelNumber::limit(10)->get();
        $data['models'] = $models;

        return view('main_index', $data);
    }
}
