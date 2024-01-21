<?php

// Include configuration for database connection
include 'config.php';

// Autoloader to automatically include class files
include 'controllers/ProductController.php';
include 'models/Product.php';
// spl_autoload_register(function ($className) {
//     echo("yakah".$className);
//     include 'controllers/' . $className . '.php';
//     include 'models/' . $className . '.php';
// });
// Basic routing example
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $actionName = $_GET['action'];
    $controllerName = ucfirst($_GET['controller']) . 'Controller';
   if (class_exists($controllerName)) {
        $controller = new $controllerName($db); // Pass the database connection to controllers
        
        if (method_exists($controller, $actionName)) {
            if (isset($_GET['params']) && !isset($_REQUEST)) {
                $idToFind = $_GET['params'];
                // echo($_GET['params']);
                $controller->$actionName($idToFind);
            }elseif (isset($_REQUEST) && !isset($_GET['params'])) {
                
                $controller->$actionName($_REQUEST);
            }elseif (isset($_GET['params']) && isset($_REQUEST) ) {
                $controller->$actionName($_GET['params'], $_REQUEST);
            }
            else {
                $controller->$actionName();
            }
            // Call the specified action
        } else {
            echo "Invalid action.";
        }
    } else {
        echo "Invalid controller.";
    }
} else {
    echo "Invalid request.";
}

?>
