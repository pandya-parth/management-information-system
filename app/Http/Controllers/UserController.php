<?php

namespace App\Http\Controllers;

use App\Http\Requests\userPasswordRequest;
use App\Http\Controllers\Controller;
use User;
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
}
