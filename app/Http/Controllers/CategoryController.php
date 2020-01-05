<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
Use Alert;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::where('parent_id',null)->get();
        return view('admin.category.index',compact('category'));
    }
    public function store(Request $request){
        $category = new Category;
        $category->slug = $request->slug;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->icon = $request->icon;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect(route('category.index'))->with('success', 'Data Successfully added!');

        // return redirect()->back();
    }
    public function edit(Request $request,$id){
        $category = Category::find($id);
        $categorys = Category::where('parent_id',null)->get();
        return view('admin.category.edit',compact('category','categorys'));
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->slug = $request->slug;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->icon = $request->icon;
        $category->save();
        return redirect(route('category.index'));
    }
    public function destroy($id){
        $category = Category::find($id);
        // alert($category)->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton(false)->showConfirmButton()->focusConfirm();
        $category->delete();
        return redirect(route('category.index'));
    }
}
