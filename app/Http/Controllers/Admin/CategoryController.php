<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $searchurl;

    public function __construct()
    {
        $this->middleware('auth.admin');
        $this->searchurl = route('admin.categories.search');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function clist(Category $category = null){
        if(is_null($category)){
            $categories = Category::where('parent_id', null)->paginate(10);
            $bread_nav = [];
        }else{
            $categories = $category->children()->paginate(10);
            $bread_nav = $category->ancestors->push($category);
        }

        $data['bread_nav'] = $bread_nav;
        $data['categories'] = $categories;
        $data['title'] = '分类列表';
        $data['searchurl'] = $this->searchurl;

        return view('admin.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $top_categories = Category::withDepth()->having('depth', '=', 0)->get();
        $data['top_categories'] = [];
        foreach($top_categories as $category){
            $data['top_categories'][$category->catid] = ['name'=> $category->name];
        }
        $data['title'] = '添加分类';
        $data['searchurl'] = $this->searchurl;

        return view('admin.category.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->saveCategory();

        return redirect()->route('admin.categories.create')->with(['status' => '添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category->parent_ids = $category->ancestors()->pluck('catid');
        $data['category'] = $category;

        $data['title'] = '修改分类';
        $data['searchurl'] = $this->searchurl;

        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        var_dump($request->all());
        $category->saveCategory();
        return redirect()->route('admin.categories.edit', ['catid'=>$category->catid])->with(['status' => '更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return \response()->json(['message'=> '删除成功']);
    }



    public function subcategory(Request $request){
        $catid = intval($request->input('id'));
        if($catid == 0){
            $categories = Category::where('parent_id', null)->get();
        }else{
            $category = Category::findorFail($catid);
            $categories = $category->children;
        }

        $sub_categories = [];
        foreach($categories as $c){
            $sub_categories[$c->catid] = ['name' => $c->name];
        }

        return response()->json($sub_categories);
    }


    public function search(Request $request){

        $q = $request->input('q');

        $categories = Category::where('name', 'like', "%{$q}%")->paginate(10);
        $data['categories'] = $categories;
        $data['bread_nav'] = [];
        $data['searchurl'] = $this->searchurl;
        $data['title'] = '搜索列表';
        $data['q'] = $q;

        return view('admin.category.list', $data);
    }
}
