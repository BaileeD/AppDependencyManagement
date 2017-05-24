<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script type="text/javascript" src="login.js"></script>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Ethan
 * Date: 24/05/2017
 * Time: 1:10 PM
 */

require_once("/conf/settings.php");

// Create connection
$conn = new mysqli($host, $user, $pswd);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$query = "CREATE DATABASE IF NOT EXISTS AppDependency";
if ($conn->query($query) === TRUE) {
   // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = mysqli_connect($host, $user, $pswd, $dbnm) or die("<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");

$query = "CREATE TABLE IF NOT EXISTS developers (
username VARCHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL,
PRIMARY KEY (username));";

mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";

$query = "CREATE TABLE IF NOT EXISTS projects (
projectName VARCHAR(64) NOT NULL,
numOfClasses int NOT NULL,
numOfDependencies int NOT NULL,
username VARCHAR(64) NOT NULL,
PRIMARY KEY(projectName),
FOREIGN KEY (username) REFERENCES developers(username));";

mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";

$query = "CREATE TABLE IF NOT EXISTS classes (
className VARCHAR(64) NOT NULL,
code MEDIUMBLOB NOT NULL,
projectName VARCHAR(64) NOT NULL,
PRIMARY KEY (className),
FOREIGN KEY (projectName) REFERENCES projects(projectName));";

mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";

$conn->close();
?>

<form action="viewProjects.php" method="POST">
    <table border = "0" id = "login" align = "center" width = "50%">
        <tr align = "left" valign = "middle">
            <td align="right"><strong>Username (<span style="color: red; ">*</span>):</strong></td>
            <td><input type="text" name="userName" maxlength="100" title="Maxinum 100 characters" onblur="inputValidate('validation.php', 'checkUserName', userName.value)" placeholder="Enter your username here" style="width: 100%; height: 16px"/></td>
            <td><span id="checkUserName"></span></td>
        </tr>
        <tr align="left" valign="middle">
            <td align="right"><strong>Password (<span style="color: red; ">*</span>):</strong></td>
            <td><input type="text" name="password" maxlength="25" title="Maxinum 25 characters" onblur="inputValidate('validation.php', 'checkPassword', password.value)" placeholder="Enter your password here" style="width: 100%; height: 16px"/></td>
            <td><span id="checkPassword"></span></td>
        </tr>
        <tr>
            <td align="right"><input type="submit" name="Log In" value="LogIn" style="width: 100%; height: 25px"/></td>
        </tr>
    </table>
</form>
</body>
</html>