<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::paginate(15);
        return view('admin.manageUser',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->number=$request->number;
        $user->password=bcrypt($request->password);
        $user->user_role=$request->user_role;
        $user->status=$request->status;
        $img=$request->file('image');
        if($img){
            $img_name=date('sihdmy');
            $ext=strtolower($img->getClientOriginalExtension());
            $full_name= $img_name.'.'.$ext;
            $img_path='admin/img/user/';
            $img_url=$img_path.$full_name;

            $img->move($img_path,$full_name);
            $user->image= $img_url;
            $user->save();
        }{
            $user->save();
        }
        return redirect('user')->with('success','User Successfully Added');
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
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->number=$request->number;
        if(!empty($request->password)){
            $user->password=bcrypt($request->password);
        }
        $user->user_role=$request->user_role;
        $user->status=$request->status;
        $img=$request->file('image');
        if($img){
            $img_name=date('sihdmy');
            $ext=strtolower($img->getClientOriginalExtension());
            $full_name= $img_name.'.'.$ext;
            $img_path='admin/img/user/';
            $img_url=$img_path.$full_name;

            if(!empty($request->old_image) & file_exists($request->old_image)){
                unlink($request->old_image);
            }
            $img->move($img_path,$full_name);
            $user->image= $img_url;
            
            $user->save();
        }{ 
            if(!empty($request->old_image)){
                $user->image= $request->old_image;
            }
            $user->save();
        }
        return redirect('user')->with('success','User Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        if(file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();

        return redirect()->back()->with('success','User Successfully delated');
    }
}
