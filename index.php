<?php
// order1 route -> views/order-form1.html
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Require autoload file
require_once('vendor/autoload.php');

// Instantiate F3 Base class
$f3 = Base::instance();

// Define a default route (328/diner)
$f3->route('GET /', function () {
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/diner-home.html');
});

// Define a breakfast route (328/diner/breakfast)
$f3->route('GET /breakfast', function () {
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// Define a order1 route (328/diner/breakfast)
$f3->route('GET|POST /order1', function ($f3) {
    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Move data from POST array to SESSION array
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];

        //Redirect to summary page
        $f3->reroute('summary');
    }

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/order-form1.html');
});

// Run Fat Free
$f3->run();