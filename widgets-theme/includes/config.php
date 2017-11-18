<?php
/*
config.php
stores configuration information for our web application
*/


//create new object
$config = new stdclass;

//prevents already sent error

ob_start();
define('DEBUG',TRUE); #we want to see all errors

//START NEW THEME STUFF
$sub_folder = 'widgets-theme';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF


//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//add include file reference here

include 'credentials.php'; //database credentials here
include 'common.php'; //favorite functions goes here

//find the current page URL:

//echo basename($_SERVER['PHP_SELF']);
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

$config->title = THIS_PAGE;
$config->banner = 'Widgets Website';

switch(THIS_PAGE){

    case 'index.php':
        $config->title = "HOME PAGE";
        $config->banner = 'Widgets';
        break;

    case 'appointment.php':
        $config->title = "Appointment PAGE";
        break;

    case 'contact.php':
        $config->title = "CONTACT PAGE";
        break;

    case 'customers.php':
        $config->title = "Customer PAGE";
        break;

    case 'daily.php':
        $config->title = "Daily PAGE";
        break;

}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF
?>


