<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script type="text/javascript" src="getClasses.js"></script>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Ethan
 * Date: 24/05/2017
 * Time: 2:34 PM
 */

require_once("/conf/settings.php");

$conn = mysqli_connect($host, $user, $pswd, $dbnm) or die("<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");

$username = $_POST["userName"];
$password = $_POST["password"];

$query = "SELECT * FROM developers WHERE username = '$username'";
$result = mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";

if(!$result){
    echo "The username you have entered is incorrect.";
    die;
}

$row = mysqli_fetch_row($result);
if($row[1] != $password){
    echo("That password you have entered is incorrect.");
    die;
}

$query = "SELECT * FROM projects WHERE username = '$username'";
$result = mysqli_query($conn, $query) or die("<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($conn) . ": " . mysqli_error($conn)) . "</p>";
if(!$result){
    echo "This developer does not have any current projects.";
    die;
}
$row = mysqli_fetch_row($result);

echo "<table style='float : left;' border=2 id = \"Projects\" align = \"center\" width = \"50%\">";
    echo "<tr align = \"left\" valign = \"middle\">";
        echo "<th>Projects</th>";
    echo "</tr>";

    while($row){
        echo "<tr align = \"left\" valign = \"middle\">";
        echo "<td> <input type='button' value='$row[0]' name='$row[0]' onClick=\"allClasses('retrieveClasses.php', '$row[0]')\"> </td>";
        echo "</tr>";
        $row = mysqli_fetch_row($result);
    }
echo "</table>";

echo "<table style='float: right;' border=2 id = \"Classes\" align = \"center\" width = \"50%\">";
    echo "<tr align = \"left\" valign = \"middle\">";
        echo "<th>Classes</th>";
    echo "</tr>";
//    echo "<tableBody>";
//    echo "</tableBody>";
//    echo "<tr align = \"left\" valign = \"middle\">";
//        echo "<td><span id=\"classes\"></span></td>";
//    echo "</tr>";
echo "</table>";

?>
</body>
</html>
