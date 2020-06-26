<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Auth;
use Validator;
Use App\User;


class ProfileController extends Controller
{
    //

    public function view(){
        $id = Auth::User()->id;
        $user = User::find($id);
       return view('backend.profile.view_profile',compact('user'));
    }

    public function edit(){
        $id = Auth::User()->id;
        $data = User::find($id);
        return view('backend.profile.edit_profile',compact('data'));
    }

    public function update(Request $request){
        $data = User::find(Auth::User()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/',$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'msg', 'Profiles Updated' );
        return redirect()->route('profiles.view');
    }

    public function passwordView(){
        return view('backend.profile.edit_password');
    }
    public function passwordStore(Request $request){
        $Validator = Validator::make($request->all(),[
            'current_password' =>'required',
            'password'=>'required|min:6|confirmed'
           ],[
               'current_password.required' => 'Must Be Enter Current Password Required!',
               'password.required' => 'Must Strong Password Required!'
           ]);


           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }

           if(Auth::attempt(['id'=>Auth::User()->id,'password'=>$request->current_password])){
               $user = User::find(Auth::User()->id);
               $user->password = bcrypt($request->password);
               $user->save();
               session()->flash( 'type', 'success' );
               session()->flash( 'msg', 'Password Change Succesfully' );
               return redirect()->route('profiles.view');
           }else{
            session()->flash( 'type', 'error' );
            session()->flash( 'msg', 'Sorry! Your Old Password does not match' );
            return redirect()->back();
           }
    }

}
