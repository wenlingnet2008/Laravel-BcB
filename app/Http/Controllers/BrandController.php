<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Http\Response;

class BrandController extends Controller
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
    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('brand_name');
        $brand->thumb = $request->file('thumb')->store('images/brands');
        $brand->content = $request->input('content', '');
        $brand->saveBrand();

        return response()->json(['message'=> 'save successfully']);
    }


    public function uploadThumb(Request $request){

        $this->validate($request, [
            'thumb' => ['required', 'image', 'max:2048'],
        ]);
        $path = $request->file('thumb')->store('images/brands');
        return response()->json(['message'=> 'upload successfully', 'path'=>$path]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($brand)
    {
        return \response()->json($brand);
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
    public function update(BrandRequest $request, $brand)
    {
        $brand->name = $request->input('brand_name');
        if($request->file('thumb')){
            $brand->thumb = $request->file('thumb')->store('images/brands');
        }
        $brand->content = $request->input('content', '');
        $brand->saveBrand();

        return \response()->json(['message'=> 'update successfully']);
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
