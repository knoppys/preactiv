<?php

namespace PreActive\Hooks;

use PreActive\User\Knpuser;

class Knppa
{
    public $sittingScore = [
        'low' => 24,
        'mid' => [24,34],
        'high' => 34
    ];

    public $standingScore = [
        'low' => 25,
        'mid' => [25,36],
        'high' => 36
    ];

    public function __construct()
    {

        //Run after the mobility form
        //add_action('gform_after_submission_4', [$this, 'knp_process_mobility_data'], 10, 1);
        
        //Sit stand test is complete, run the course logic
        //add_action('gform_after_submission_#', [$this, 'knp_course_create'], 10, 1);

        //Hook to update the users encrypted data when the password is changed
        //add_action('password_reset', [$this, 'knp_update_password'], 10, 2);

    }

    private function knp_process_mobility_data(array $entry)
    {

        //Get current user data
        $profile = new Knpuser();

        //Create new course


        //Update the user profile with the sit stand test data        
        $decodedData = $profile->get_user_profile();
        $decodedData['sit_stand_status'] = $entry[15];
        $profile->update_user_profile($decodedData);

    }

    public function knp_update_password($user, $new_pass){

        //Get the current user data
        $profile = new Knpuser();
        $decodedData = $profile->get_user_profile();

        //Create the new key from the new password. 
        $newHash = wp_hash_password( $new_pass );

        //Reset the encrypted data. 
        $profile->reset_user_profile($decodedData, $newHash);


    }

}