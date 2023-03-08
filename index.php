<?php
// order1 route -> views/order-form1.html
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Require autoload file
require_once('vendor/autoload.php');

// Start Session AFTER requiring autoload.php
session_start();
//var_dump($_SESSION);

// Instantiate F3 Base class
$f3 = Base::instance();

// Instantiate a Controller object and DataLayer object
$con = new Controller($f3);
$dataLayer = new DataLayer();


// Define a default route (328/diner)
$f3->route('GET /', function () {
    $GLOBALS['con']->home();
});

// Define a order1 route (328/diner/order-form1)
$f3->route('GET|POST /order1', function ($f3) {
    $GLOBALS['con']->order1();
});

// Define a default route (328/order2)
$f3->route('GET|POST /order2', function ($f3) {
    $GLOBALS['con']->order2();
});

//Define a summary route (328/summary)
$f3->route('GET /summary', function() {
    $GLOBALS['con']->summary();
});

// Run Fat Free
$f3->run();