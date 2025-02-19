<?php

//  For Development Purpose
//  $serverName = "localhost";
//  $serverUser = "root";
//  $serverPass = "";
//  $dbName     = "cms";

//  For Production Purpose - Remote Database(remotemysql.com)
$serverName = "ls-1bc7b697c347c374107575d077a51bc865b589d0.cvgwyu4m0t3u.ap-southeast-1.rds.amazonaws.com";
$serverUser = "dbmasteruser";
$serverPass = "8D{H4Vt^S,?d6X5Ikimn_SWYy|=9{8H$";
$dbName     = "cmsfinal";

$conn       = mysqli_connect($serverName, $serverUser, $serverPass, $dbName) or die("Err! Connection Failed!!" + mysqli_connect_error());
