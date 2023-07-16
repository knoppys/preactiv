<?php

namespace PreActive\User;

use PreActive\User\KnpCrypto;

class Knpuser
{

    protected $user;

    public function __construct()
    {

        $this->user = get_user_data(wp_get_current_user());

    }

    public function get_user_profile(): array
    {

        //Check to see if the use has any patient profile data, if they do, decode and return it
        $meta = metadata_exists('user', $this->user->ID, 'patient_profile') ? get_user_meta($this->user->ID, 'patient_profile', true) : false;
        if ($meta) {
            $crypto = new KnpCrypto();
            $data = $crypto->decode_user_profile($meta);
            return $data;

        }

        //If the user has no data, return an empty array ready to be populated
        return [];

    }

    public function update_user_profile(array $meta)
    {

        //Encrypt the data and update the user meta
        $crypto = new KnpCrypto();
        $data = $crypto->encode_user_profile($meta);
        update_user_meta($this->user->ID, 'patient_profile', $data);

    }

    public function reset_user_profile(array $meta, string $key){

         //Encrypt the data and update the user meta
         $crypto = new KnpCrypto();
         $data = $crypto->encode_user_profile($meta);
         update_user_meta($this->user->ID, 'patient_profile', $data);

    }





}