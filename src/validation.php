<?php
/**
 * Created by PhpStorm.
 * User: devey
 * Date: 22/05/2017
 * Time: 2:53 PM
 */
$userName = $_POST["checkUserName"];
$password = $_POST["checkPassword"];


if(trim($userName) != "")
{
    if(!preg_match('/^[a-zA-Z0-9]*$/', $userName))
    {
        echo "<span style=\"color: red; \">Only letters and numbers</span>";
    }
    else
    {
        echo "<span style=\"color: green; \">OK</span>";
    }
}

if(trim($password) != "")
{
   echo "<span style=\"color: green; \">OK</span>";
}