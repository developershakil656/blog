<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostController extends Controller
{
    public function add(){
        $category=DB::table('categories')->get();
        return view('admin.addPost',compact('category'));
    }
    public function save(Request $request){
        $post=new Post();
        $post->title=$request->title;
        $post->cat_id=$request->cat_id;
        $post->content=$request->content;
        $img=$request->file('img');
        if($img){
            $img_name=date('sihdmy');
            $ext=strtolower($img->getClientOriginalExtension());
            $full_name= $img_name.'.'.$ext;
            $img_path='admin/img/post/';
            $img_url=$img_path.$full_name;

            $img->move($img_path,$full_name);
            $post->img= $img_url;
            $post->save();
        }{
            $post->save();
        }
        return redirect()->back()->with('success','Post Successfully Added');

    }
    public function manage(){
        $post=Post::with('category')->paginate(15);
        return view('admin.managePost',compact('post'));
        
    }
    public function edit($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('admin.editPost',compact('post','category'));
    }
    public function update(Request $request){
        $data=array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['cat_id'] = $request->cat_id; $img=$request->file('img');
        $img=$request->file('img');
        if($img){
            $img_name=date('sihdmy');
            $ext=strtolower($img->getClientOriginalExtension());
            $full_name= $img_name.'.'.$ext;
            $img_path='admin/img/post/';
            $img_url=$img_path.$full_name;

            if(!empty($request->old_img)){
                unlink($request->old_img);
            }
            
            $img->move($img_path,$full_name);
            $data['img']= $img_url;
            DB::table('posts')->where('id',$request->id)->update($data);

            
            
            
        }else{
            $data['img'] = $request->old_img;
            DB::table('posts')->where('id',$request->id)->update($data);
        }
        return redirect()->route('manage-post')->with('success','Post Successfully updated');
    }
    public function delete($id){
        $post= Post::find($id);
        $post->delete();

        return redirect()->back()->with('success','Post Successfully delated');
    }
}
