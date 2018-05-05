<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category){
        return response()->json($category);
    }

    public function store(CategoryRequest $request){
        $category = new Category();
        $category->name = $request->input('catname');
        $category->parentid = $request->input('parentid');
        $category->saveCategory();
        return \response()->json(['message'=>'save successfully']);
    }

    public function update(CategoryRequest $request ,$category){
        $category->name = $request->input('catname');
        $category->parentid = $request->input('parentid');
        $category->updateCategory();
        return \response()->json(['message'=>'update successfully']);
    }

    public function destroy($category){
        $category->deleteCategory();
        return \response()->json(['message'=>'delete successfully']);
    }
}
