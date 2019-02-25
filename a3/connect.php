<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: connection to database page.
-->
<?php
//Try to login to phpmyadmin with this login.
try {
    $dbh = new PDO("mysql:host=localhost;dbname=000747411", "000747411", "19980310");
}
//If the login doesn't work catch the exception and send the user a message.
catch (Exception $e) {
    die("ERROR connecting to Database!");
}