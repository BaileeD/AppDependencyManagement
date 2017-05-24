<?php
/**
 * Created by PhpStorm.
 * User: Ethan
 * Date: 24/05/2017
 * Time: 3:28 PM
 */

require_once("/conf/settings.php");

$conn = mysqli_connect($host, $user, $pswd, $dbnm) or die("<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");

$project = $_POST["project"];

$query = "SELECT * FROM classes WHERE projectName = '$project'";
$result = mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";

$classesList = "";
$row = mysqli_fetch_row($result);
while($row){
    $classesList .=  $row[0].",";
    $row = mysqli_fetch_row($result);
}

$classesList = rtrim($classesList, ',');

echo "" . $classesList . "";
?>