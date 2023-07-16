<?php
/*
Plugin Name: Knp PreActiv
Plugin URI: https://github.com/knoppys/preactiv
Description: Course logic and patient profiles
Version: 1
Author: Alex Knopp
Author URI: https://www.knoppys.co.uk
*/

require dirname(__FILE__).'/vendor/autoload.php';

use PreActive\Hooks\Knppa;

add_action('init', function () {

    new Knppa();

});