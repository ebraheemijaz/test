<?php
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'mmsapp_rccgvhl';
$dbPassword = 'FemiAdeko01@';
$dbName     = 'mmsapp_mms';

// Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
} 

// Get search term
$searchTerm = $_GET['q'];

// Get matched data from skills table
$query = $db->query("SELECT id, name FROM skills WHERE name LIKE '%".$searchTerm."%' AND status = '1' ORDER BY name ASC");

// Generate skills data array
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $skillData[] = $row;
    }
}

// Return results as json encoded array
echo json_encode($skillData);
?>