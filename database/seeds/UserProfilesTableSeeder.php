<?php

use Illuminate\Database\Seeder;
use App\People;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profile')->delete();

  
        People::create(
        	['user_id' =>14,
            'fname' =>'kajal',
            'lname' =>'kanzaria',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
        	]);

        People::create(
        	['user_id' =>15,
            'fname' =>'baldev',
            'lname' =>'parmar',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
        	]);

        People::create(
        	['user_id' =>16,
            'fname' =>'ravi',
            'lname' =>'mehta',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
        	]);

        People::create(
        	['user_id' =>17,
            'fname' =>'nirav',
            'lname' =>'panchal',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
        	]);

        People::create(
        	['user_id' =>18,
            'fname' =>'bijal',
            'lname' =>'gajjar',
            'mobile' =>'544454545',
            'phone' =>'5424545454',
            'adrs1' =>'sdsdsdsd',
            'adrs2' =>'sdsdsdsd',
            'city' =>'sdsdsdsd',
            'state' =>'sdsdsdsd',
            'country' =>'IN',
            'gender' =>'male',
            'pan_number' =>'5454545',
            'department' =>1,
            'designation' =>1,
            'google' =>'sdsdsdsd',
            'facebook' =>'sdsdsdsd',
            'website' =>'sdsdsdsd',
            'skype' =>'sdsdsdsd',
            'linkedin' =>'sdsdsdsd',
            'twitter' =>'sdsdsdsd',
        	]);
    }
}
