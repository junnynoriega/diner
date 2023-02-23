<?php
// order1 route -> views/order-form1.html
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Start Session AFTER requiring autoload.php
session_start();

// Require autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once ('model/validate.php');
//require_once ('classes/order.php');

//$myOrder = new Order();
//$myOrder->setFood("tacos");
//echo $myOrder->getFood();
//var_dump($myOrder);

//$food1 = "tacos";
//$food2 = "        ";
//$food3 = "x";
//
//echo ValidFood($food1) ? "valid" : "not valid";
//echo ValidFood($food2) ? "valid" : "not valid";
//echo ValidFood($food3) ? "valid" : "not valid";
//var_dump(getMeal());

// Instantiate F3 Base class
$f3 = Base::instance();

// Define a default route (328/diner)
$f3->route('GET /', function () {
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/diner-home.html');
});

//// Define a breakfast route (328/diner/breakfast)
//$f3->route('GET /breakfast', function () {
//    // Instantiate a view
//    $view = new Template();
//    echo $view->render('views/breakfast.html');
//});

// Define a order1 route (328/diner/order-form1)
$f3->route('GET|POST /order1', function ($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $newOrder = new Order();

        //Move data from POST array to SESSION array
        $food = trim($_POST['food']);
        if (validFood($food)) {
            $newOrder->setFood($food);
        }
        else {
            $f3->set('errors["food"]',
                'Food must have at least 2 characters');
        }

        // Validate the meal
        $meal = $_POST['meal'];
        if (validMeal($meal)) {
            $newOrder->setMeal($meal);
        }
        else {
            $f3->set('errors["meal"]',
            'Meal is invalid');
        }

        // Redirect to summary page
        // if there are no errors
        if (empty($f3->get('errors'))) {
            $_SESSION['newOrder'] = $newOrder;
            //Redirect to summary page
            $f3->reroute('order2');
        }
    }
    // Add meals to F3 hive
    $f3->set('meals',getMeals());

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/order-form1.html');
});

// Define a default route (328/order2)
$f3->route('GET|POST /order2', function ($f3) {
    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Move data from POST array to SESSION array
        $newOrder = $_SESSION['newOrder'];
        $condString = implode(", ", $_POST['condiments']);
        $newOrder->setCondiments($condString);
        $_SESSION['newOrder'] = $newOrder;

//        $condString = implode(",",$_POST['cond']);


        //Redirect to summary page
        $f3->reroute('summary');
    }
    // Add meals to F3 hive
    $f3->set('condiments',getCond());

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/order-form2.html');
});

//Define a summary route (328/summary)
$f3->route('GET /summary', function() {

    // write to database

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/order-summary.html");

    // destroy session array (CLEARING any previous data so that it doesn't overlap new data)
    session_destroy();

});

// Run Fat Free
$f3->run();