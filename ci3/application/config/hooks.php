<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '/var/www/vendor/autoload.php';

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/


$hook['pre_system'] = function() {
//    if(!defined(APPPATH)){
  $APPPATH = '/var/www/hackepson/ci3/application/';
//    }else{
//        $APPPATH = APPPATH;
//    }

  try {
    $dotenv = Dotenv\Dotenv::create($APPPATH);
//        $dotenv = new Dotenv\Dotenv($APPPATH);
    $dotenv->load();
  } catch (Exception $e) {
    //
  }
  function env($variable, $default = null) {
    $value = getenv($variable);
    return ($value) ? $value : $default;
  }
};


