<?php

namespace App\Http\Controllers;

use App\Http\Requests\userPasswordRequest;
use App\Http\Controllers\Controller;
use User;
use App\People;
use App\Department;
use App\Designation;
use Auth;
use Hash;
use Redirect;
class UserController extends Controller
{
    public function changePassword()
    {
    	return view('change-password');
    }

    public function updatePassword(userPasswordRequest $request)
    {
        $user=Auth::user();
        $credentials = [
            'email' => Auth::user()->email,
            'password' => $request->get('oldpassword'),
        ];

        if(Auth::validate($credentials))
        {
            
            $user->password = bcrypt($request->get('newpassword'));
            $user->save();
              return redirect()->intended('/');

        }
        return redirect()->back()->with('message','Invalid Current Password');

   
        
    }

    public function getAccount()
    {
        $departments = Department::all();
        $designations = Designation::all();
        dd($user = People::find($id));
        return view('auth/change-profile',compact('departments','designations'));
    }

    public function postAccount()
    {
        $id = Auth::user()->people->id;
        $user = People::find($id);
        $user->fname = Input::get('fname');
        $user->email = Input::get('email');
        $user->save();
        return view('auth/change-profile');

    }
}
