<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home(){
        $post=Post::with('category')->paginate(3);
        $category=Category::all();
        return view('fontend.home',compact('post','category'));
    }
    public function about(){
        return view('fontend.about');
    }
    public function contact(){
        return view('fontend.contact');
    }
    public function contact_submit(Request $request){
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'comment' => 'required|max:255',
        ]);
        $data=array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'comment' => $request->comment,
        );
        Mail::send('fontend.contact_submit',$data,function($message) use($data){
            $message->from('shamimhossen6622@gmail.com','Developer Shakil');
            $message->to($data['email']);
            $message->subject('Thanks for contact us');
        });
        return redirect()->back();
    }
    public function single_post($id){
        $post=Post::with('category')->where('id',$id)->first();
        $category=Category::all();

        return view('fontend.single_post',compact('post','category'));
    }
    public function single_category($id){
        $post=Post::with('category')->where('cat_id',$id)->paginate(3);
        $category=Category::all();
        $this_cat=Category::find($id);
        
        return view('fontend.single_category',compact('post','category','this_cat'));
    }
}
