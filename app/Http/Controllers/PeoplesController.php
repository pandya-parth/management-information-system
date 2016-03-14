<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\People;
use App\Project;
use App\ProjectUser;
use App\Department;
use App\Designation;
use App\User;
use Illuminate\Support\Facades\Input;
use Redirect;
use Former\Facades\Former;
use Validator;
use Image;
use Hash;
use App\UserEducation;
use App\UserExperience;
use Mail;

class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('peoples.index',compact('departments','designations'));   
    }

    public function getPeoples(Request $request)
    {
       $peoples = People::all();
       return response()->json($peoples);
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

            
            Mail::send('auth.emails.user_activation', ['user_info'=>array($user->email,$pass)], function($message) {
                            $message->to(Input::get('email'));
                            $message->subject('Thank You');
            });

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

            $input= Input::get('experience');
             
                foreach ($input as $key => $value) {
                    $experience = new UserExperience($value);
                    $experience->user_id=$user->id;
                    $experience->save();
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
        $people = People::find($id);
        $projects = ProjectUser::where('user_id','=',$people->user_id)->get();
        return view('peoples.view',compact('people','projects'));
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
        $educations = UserEducation::where('user_id','=',$people->user_id)->get();
        $experiences = UserExperience::where('user_id','=',$people->user_id)->get();
        return response()->json(array($people,$people->user->email,$educations,$experiences));

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
         $people = People::findOrFail($id);
         $people->update(Input::except(['user','email','education','experience']));
         $educations = Input::get('education');
         foreach($educations as $e)
         {
            if($e['id']=='')
            {
                $education = new UserEducation();
                $education->user_id = $people->user_id;
                $education->qualification = $e['qualification'];
                $education->college = $e['college'];
                $education->university = $e['university'];
                $education->passing_year = $e['passing_year'];
                $education->percentage = $e['percentage'];
                $education->save();
            }
            else
            {  
                $education = UserEducation::find($e['id']);
                $education->qualification = $e['qualification'];
                $education->college = $e['college'];
                $education->university = $e['university'];
                $education->passing_year = $e['passing_year'];
                $education->percentage = $e['percentage'];
                $education->save();
            }
         }

         $experiences=Input::get('experience');
         foreach($experiences as $e)
         {
            if($e['id']=='')
            {
                $experience = new UserExperience();
                $experience->user_id=$people->user_id;
                $experience->company_name = $e['company_name'];
                $experience->from = $e['from'];
                $experience->to = $e['to'];
                $experience->salary = $e['salary'];
                $experience->reason = $e['reason'];
                $experience->save();
            }
            else
            {
                $experience=UserExperience::find($e['id']);
                $experience->company_name = $e['company_name'];
                $experience->from = $e['from'];
                $experience->to = $e['to'];
                $experience->salary = $e['salary'];
                $experience->reason = $e['reason'];
                $experience->save();
            }
         }
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

    public function educationDestroy($id)
    {
        $education = UserEducation::find($id);
        $education->delete();

        return response()->json(['success'=>true]);
    }

    public function experienceDestroy($id)
    {
        $experience = UserExperience::find($id);
        $experience->delete();

        return response()->json(['success'=>true]);
    }

    /* to add people in project */

    public function getProjectPeople(Request $request,$id)
    {
        $allPeople =  ProjectUser::whereProjectId($id)->get();
        return view('peoples.addpeople',compact('allPeople'));


    }

    public function postProjectPeople(Request $request)
    {
        $addpeople=ProjectUser::create(Input::all());
        $addpeople->project_id = ProjectUser::peoples()->attach($request->get('project_id'));
        $addpeople->user_id = ProjectUser::peoples()->attach($request->get('user_id'));
        $addpeople->save();
        return response()->json(['success'=>true]);
    }

    public function updateProjectPeople(Request $request,$id)
    {
       //
    }

    public function destroyProjectPeople(Request $request)
    {
        //
    }
}
