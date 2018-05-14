<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        $data['brands'] = $brands;
        $data['title'] = '品牌列表';
        return view('admin.brand.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = '添加品牌';
       return view('admin.brand.add', $data);
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
        $brand->name = $request->input('name');
        $brand->thumb = $this->uploadThumb($request);
        $brand->content = $request->input('content', '');
        $brand->saveBrand();

        return redirect()->route('admin.brands.create')->with(['status' => '添加成功']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand->thumb = json_decode($brand->thumb, true);
        $data['brand'] = $brand;

        $data['title'] = '修改品牌';
        return view('admin.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->name = $request->input('name');
        if($request->file('thumb')){
            $brand->thumb = $this->uploadThumb($request);
        }
        $brand->content = $request->input('content', '');
        $brand->saveBrand();


        return redirect()->route('admin.brands.edit', ['brandid'=>$brand->brandid])->with(['status' => '更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return \response()->json(['message'=> '删除成功']);
    }

    /**
     *  图片上传处理
     * @param Request $request
     * @return string
     */
    protected function uploadThumb(Request $request){
        return json_encode(['thumb1'=> $request->file('thumb')->store('brands', 'upload')]);
    }
}
