<?php
ini_set('session.cookie_httponly', true);
require('includes/config.php');
require('includes/functions.php');

if (isset($_GET['id'])){		
    $id = $_GET['id']; 
    $id = preg_replace("/[^0-9]/", "", $id);

    if (deleteCustomer($id) == 0) {
        echo "Operation failed";
    }
    		
    header("Location: index.php");
    exit();
} else {
	header("Location: index.php");
	exit();
}

?>