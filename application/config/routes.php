<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'LoginController/index/login';
$route['register'] = 'LoginController/index/register';
$route['login/submit'] = 'LoginController/login';
$route['register/submit'] = 'LoginController/register';
$route['logout'] = 'LoginController/logout';

$route['(:any)'] = 'StudentController/index/$1';
$route['attendance/submit'] = 'StudentController/setNewAttendance';

$route['lecturer/(:any)'] = 'LecturerController/index/$1';
$route['lecturer/class/submit'] = 'LecturerController/setNewClass';
$route['lecturer/attendance/(:any)'] = 'LecturerController/index/attendance/$1';

