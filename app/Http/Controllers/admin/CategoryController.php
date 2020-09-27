<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add(){
        return view('admin.addCategory');
    }
    public function manage(){
        $category = Category::paginate(10);
        return view('admin.manageCategory',compact('category'));
    }
    public function save(Request $request){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_name;
        $category->save();
        
        return redirect()->back()->with('success','Category Successfully Added');
    }
    public function change_status($id,$status){
        $category = Category::find($id);
        $category->status=$status;
        $category->save();

        return back()->with('success','Status Successfully Changed');
    }
    public function edit($id){
         $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.editCategory',compact('category'));
    }
    public function update(Request $request){
        $data=array();
        $data['category_name'] = $request->category_name;
        $data['category_slug'] = $request->category_name;
        DB::table('categories')->where('id',$request->id)->update($data);

        return redirect()->back()->with('success','Category Successfully Updated');
    }
    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('success','Category Successfully delated');
   }
}
