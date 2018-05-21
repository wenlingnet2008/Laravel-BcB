<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth.admin');
        App::setLocale('zh_cn');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function clist(Category $category = null, Request $request){
        if($request->method() == 'POST'){
            $this->validate($request, [
                'catids' => 'required|array',
                'catids.*' => 'required|integer',
                'category.*.list_order' => 'required|integer',
                'category.*.name' => ['required', 'max:50', 'unique:categories,name,*,catid'],
            ]);


            $catids = $request->input('catids');
            $update_categories = $request->input('category');

            foreach($catids as $catid){
                $cat = Category::find($catid);
                $cat->name = $update_categories[$catid]['name'];
                $cat->list_order = $update_categories[$catid]['list_order'];
                $cat->saveCategory();
            }

            return back()->with(['status' => '更新成功']);
        }
        if(is_null($category)){
            $categories = Category::withCount(['descendants', 'paras'])->where('parent_id', null)->orderBy('list_order', 'asc')->get();
            $bread_nav = [];
        }else{
            $categories = $category->children()->withCount(['descendants', 'paras'])->orderBy('list_order', 'asc')->get();
            $bread_nav = $category->ancestors->push($category);
        }

        $data['total'] = Category::count();
        $data['bread_nav'] = $bread_nav;
        $data['categories'] = $categories;

        return view('admin.category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\request()->filled('catid')){
            $catid = intval(\request()->input('catid'));
            $data['parent_ids'] = Category::ancestorsAndSelf($catid)->pluck('catid');
        }

        $top_categories = Category::withDepth()->having('depth', '=', 0)->get();
        $data['top_categories'] = [];
        foreach($top_categories as $category){
            $data['top_categories'][$category->catid] = ['name'=> $category->name];
        }

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

        if(is_array($request->input('name'))){
            foreach($request->input('name') as $name){
                $category = new Category();
                $category->name = $name;
                $category->parent_id = $request->input('parent_id');
                $category->saveCategory();
            }
        }else{
            $category = new Category();
            $category->name = $request->input('name');
            $category->parent_id = $request->input('parent_id');
            $category->saveCategory();
        }


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
        $this->validate($request, ['q'=>'required']);

        $q = $request->input('q');

        $categories = Category::where('name', 'like', "%{$q}%")->withCount('descendants')->get();
        $data['categories'] = $categories;
        $data['bread_nav'] = [];
        $data['total'] = Category::count();


        return view('admin.category.list', $data);
    }


    public function fixTree(){
        if(Category::isBroken()){
            Category::fixTree();
            return view('layouts.admin.error_notice')->with('status','修复完成');
        }else{
            return view('layouts.admin.error_notice')->with('status','没有错误, 不需要修复');
        }

    }
}
