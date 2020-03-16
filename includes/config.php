<?php
debug_backtrace() || die(header('HTTP/1.0 404 Forbidden'));

define("host", "localhost");
define("dbuser", "root");
define("dbpass", "");
define("dbname", "ongeza_test");

$conn = mysqli_connect(host, dbuser, dbpass, dbname) or die('Please check connection...');
?>