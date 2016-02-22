<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\People;
use App\User;
use Illuminate\Support\Facades\Input;
use Redirect;
use Former\Facades\Former;
use Validator;
use Image;
use Hash;
use App\UserEducation;
use Mail;

class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peoples.index');   
    }

    public function getProjectPeople(){
        $allPeople = People::all();
        return view('peoples.addpeople',compact('allPeople'));
    }

    public function getPeoples()
    {
    
       $peoples = People::all();
       return response()->json($peoples);
    }

    public function postPeoples()
    {
        $addpeople=Project::create(Input::all());
        $addpeople->peoples()->attach($request->get('user_id'));
        $addpeople->save();
        return response()->json(['success'=>true]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $pass=str_random(8);
            $user = new User;
            $user->email = Input::get('email');
            $user->password = Hash::make($pass);
            $user->active = true;
            $user->save();
            
            // Mail::send('auth.emails.user_activation', ['user_info'=>array($user->email,$pass)  ], function($message) {

            //                 $message->to('kajal@krishaweb.net');
            //                 $message->subject('Thank You');
            //             });

            $user_profile = new People;
            $user_profile->user_id = $user->id;
            $user_profile->fname = Input::get('fname');
            $user_profile->lname = Input::get('lname');
            $user_profile->mobile = Input::get('mobile');
            $user_profile->phone = Input::get('phone');
            $user_profile->dob = Input::get('dob');
            $user_profile->photo = Input::get('photo');
            $user_profile->marital_status = Input::get('marital_status');
            $user_profile->gender = Input::get('gender');
            $user_profile->adrs1 = Input::get('adrs1');
            $user_profile->adrs2 = Input::get('adrs2');
            $user_profile->city = Input::get('city');
            $user_profile->state = Input::get('state');
            $user_profile->country = Input::get('country');
            $user_profile->pan_number = Input::get('pan_number');
            $user_profile->department = Input::get('department');
            $user_profile->designation = Input::get('designation');
            $user_profile->management_level = Input::get('management_level');
            $user_profile->join_date = Input::get('join_date');
            $user_profile->google = Input::get('google');
            $user_profile->facebook = Input::get('facebook');
            $user_profile->skype = Input::get('skype');
            $user_profile->linkedin = Input::get('linkedin');
            $user_profile->twitter = Input::get('twitter');
            $user_profile->website = Input::get('website');

            $user_profile->save();
            
            
            
             $input= Input::get('education');
             
                foreach ($input as $key => $value) {
                    $education = new UserEducation($value);
                    $education->user_id=$user->id;
                    $education->save();
                }
                    
             
                

            



       

            return response()->json(['success'=>true]);
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
        
    }

    public function getPeople($id,Request $request)
    {

        $people = People::findOrFail($id);
        $data=$people->user->id;
        //$UserEducation = UserEducation::find($people->user_id)->userEducations;
        $education = user::find($data)->userEducations;
        dd($education);
        

        return response()->json(array($people,$people->user->email,$data));

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
         $people = People::find($id);
         $people->update(Input::all());  
         return response()->json(['success'=>true]);      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = User::find($id);
        $people->delete();    

        return response()->json(['success'=>true]);
    }
}
