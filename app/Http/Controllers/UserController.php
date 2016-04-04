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
use Illuminate\Support\Facades\Input;
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
        $user = People::find(Auth::user()->people->id);
        Former::populate($user);
        return view('auth/change-profile',compact('user'));
    }

    public function postAccount()
    {
        $user = People::find(Auth::user()->people->id);
        $user->update(Input::all());
        return redirect('/');

    }
}
