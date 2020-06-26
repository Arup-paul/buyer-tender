<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
class UserController extends Controller
{
    //

    public function view(){
         $data['data'] = User::all();
        return view('backend.users.view_user',$data);
    }

    public function add(){
        return view('backend.users.add_user');
    }

    public function store(Request $request){
        $Validator = Validator::make($request->all(),[
            'name' =>'required|min:4',
            'role' =>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
           ],[
               'name.required' => 'We Need To Know Your Full Name!',
               'role.required' => 'Must be set your Role!',
               'email.required' => 'Must be Your Valid Email!',
               'password.required' => 'Must Strong Password Required!'
           ]);


           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = bcrypt($request->password);
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'msg', 'Users Added' );
        return redirect()->route('users.view');
    }

    public function edit($id){
        $data = User::find($id);
        return view('backend.users.edit_user',compact('data'));
    }

    public function update($id, Request $request){
        $Validator = Validator::make($request->all(),[
            'name' =>'required|min:4',
            'role' =>'required',
            'email'=> 'required|email',
           ],[
               'name.required' => 'We Need To Know Your Full Name!',
               'role.required' => 'Must be set your Role!',
               'email.required' => 'Must be Your Valid Email!',
           ]);


           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'msg', 'Users Updated' );
        return redirect()->route('users.view');
    }

    public function delete($id){
       $user = User::find($id);
       if(file_exists('public/upload/user_images'.$user->image) AND ! empty($user->image)){
           unlink('public/upload/user_images'.$user->image);
       }
       $user->delete();
       session()->flash( 'type', 'success' );
       session()->flash( 'msg', 'Users Deleted' );
       return redirect()->route('users.view');
    }
}
