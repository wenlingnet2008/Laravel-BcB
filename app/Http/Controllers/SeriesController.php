<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Series;
use App\Models\Brand;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $series = new Series();
        $brandid = $request->input('brandid');
        $brand = Brand::findOrFail($brandid);

        $catid = $request->input('catid');
        $category = Category::findOrFail($catid);

        $series->name = $request->input('series_name');
        $series->parentid = $request->input('parentid');
        $series->brand()->associate($brand);
        $series->saveCategory();

        $brand->categories()->save($category);
        $series->categories()->save($category);




        return response()->json(['message'=>'save successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find(17);

        print_r($category->brands()->where('brandid',3)->first()->toArray());


        $series = Series::find(20);
        print_r($series->categories->toArray());
        return 'aa';
        return response()->json([]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
