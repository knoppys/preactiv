<?php

/*
 * Plugin Name:       Knp PreActive Customisations
 * Description:       Handle the logic for form submissions, courses etc and hadnle the encrypted user profiles
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 */

require dirname(__FILE__).'/vendor/autoload.php';

use PreActive\Hooks\Knppa;

add_action('init', function () {

    new Knppa();

});