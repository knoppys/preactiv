<?php 

namespace PreActive\Courses;
use PreActive\User\Knpuser;

class Knpcourse extends Knpuser {

    protected $profile;

    public function __construct(){

        parent::__construct();

        $this->profile = $this->get_user_profile();

    }

    public function new_course(){

        

    }

}