<?php

debug_backtrace() || die(header('HTTP/1.0 404 Forbidden'));

function noHTML($input, $encoding = 'UTF-8'){
    return htmlentities($input, ENT_QUOTES | ENT_HTML5, $encoding);
}

function customerExists($firstname, $lastname, $town_name){
	global $conn;
	$sql = "SELECT id FROM customer WHERE first_name = ? and last_name = ? and town_name = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $town_name);
	mysqli_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$row_count = mysqli_stmt_num_rows($stmt);
	if ($row_count >= 1) {
		return 1;
	}
}

function insertCustomer($firstname, $lastname, $town_name, $gender_id){
	global $conn;
	$sql = "INSERT INTO customer(first_name, last_name, town_name, gender_id) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "sssi", $firstname, $lastname, $town_name, $gender_id);
	mysqli_stmt_execute($stmt);
	return mysqli_stmt_affected_rows($stmt);
}

function deleteCustomer($id){
	global $conn;
	$sql = "UPDATE customer SET is_deleted = 1 WHERE id = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);	
	return mysqli_stmt_affected_rows($stmt);
}

function updateCustomer($firstname, $lastname, $town_name, $gender_id, $id){
	global $conn;
	$sql = "UPDATE customer SET first_name = ?, last_name = ?, town_name = ?, gender_id = ? WHERE id = ?";
	$stmt = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($stmt, "sssii", $firstname, $lastname, $town_name, $gender_id, $id);
	mysqli_stmt_execute($stmt);
	return mysqli_stmt_affected_rows($stmt);
}

function getAllGender(){
	global $conn;
	$sql = "SELECT * from gender ORDER BY id";
	return ($result = mysqli_query($conn, $sql));		
}

function getAllCustomers(){
	global $conn;
	$sql = "SELECT customer.id as id, customer.first_name as first_name, customer.last_name as last_name, customer.town_name as town_name, gender.gender_name as gender_name from customer JOIN gender ON customer.gender_id = gender.id WHERE customer.is_deleted = 0 ORDER BY customer.first_name, customer.last_name, customer.town_name";
	return ($result = mysqli_query($conn, $sql));		
}

function fetchID($id){
	$sql = "SELECT customer.id as id, customer.first_name as first_name, customer.last_name as last_name, customer.town_name as town_name, customer.gender_id as gender_id, gender.gender_name as gender_name from customer JOIN gender ON customer.gender_id = gender.id WHERE customer.id = ?";
	return $sql;
}
?>