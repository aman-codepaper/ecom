<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
      $category = new Category;
      $category->category_name = $request->category;
      $category->save();
      flash()->success('Added Category Succesfully.');
      return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        flash()->success('Update Category Succesfully.');
        return redirect('/view_category');
    }

    public function add_product(){
        $category = Category::all();
         
        return view('admin.add_product',compact('category'));
    }
}