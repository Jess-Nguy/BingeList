<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: main page where delete, update and insert function is located.
-->

<?php
//Start/resume session.
session_start();
//Connect to database.
include "connect.php";
//SQL command to see all rows.
$sql = "SELECT * FROM a3_tv_shows";
//Prepares the SQL statement.
$stmt = $dbh->prepare($sql);
//Executes the SQL statement.
$result = $stmt->execute();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Main page</title>
        <style>
            body{
                font-family: Arial, Impact, Trebuchet MS; 
                background-image: url(images/suits.jpg);                
                background-size: cover;
                background-repeat: no-repeat, repeat;
                padding: 15px;
            }
            .button{
                font-family: Arial, Impact, Trebuchet MS;
                background-color: #2681B6;
                border: 2px solid #2681B6;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .buttonLogout{
                position: absolute;
                right: 10px;
                top: 10px;
                border-radius: 25px; 
            }
            .buttonAdd{       
                position:absolute;
                top:5px;
                font-size:24px;
                border-radius: 50%;

            }
            .button:hover {
                background-color: white; 
                color: black; 
                border: 2px solid #2681B6;
            }

            h1{
                font-family: Arial, Impact, Trebuchet MS;               
                text-align: center;
                color: red;
            }
            table,th,td{
                border: 2px solid gray;
                text-align: center;
                border-radius: 5px;
                color: white;
                border-collapse: collapse;
                padding: 5px; 
            }
            input[value="X"]
            {
                background-color: #FE1919;
                border-color: #FE1919;
                font-size: 16px;
                color: white;
            }
             input[value="Update"]
            {
                background-color: #09C441;
                border-color: #09C441;
                font-size: 16px;
                color: white;
            }
            figure{
                margin: 0px;
            }
            .logo{
                margin-left:43%;
                width:200px;
                height:50px;                
            }


        </style>
    </head>
    <body>
        <!--Website logo image-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
        <?php
        //Checks if user has logged in or not, if not will relocate to error page. Otherwise they are able to use the page.
        if (($_SESSION["loggedIn"]) == false) {
            header('Location: error.php');
            exit();
        } else {
            //Logout link.
            echo "<a href='index.php' class='button buttonLogout'>Logout</a> <br>";
            //Insert link.
            echo "<a href='insert.php' class='button buttonAdd'>+</a> <br>";
            //Greeting heading.
            echo "<h1>Welcome $_SESSION[correctUser] !</h1>";
            //Database table and table heading.
            echo" <table >
            <tr><th> TV id </th><th> Title </th><th> Main Character </th><th> Actor </th><th> Duration </th><th> Release Date </th><th> Genre </th>
                <th> Delete </th><th> Update </th></tr>";
            //While there are still rows to in phpmyadmin to grab, place them into table data.
            while ($row = $stmt->fetch()) {
                echo"<tr><td>$row[tvID]</td>
                    <td>$row[title]</td>
                    <td>$row[mainCharacter]</td>
                    <td>$row[actor]</td>
                    <td>$row[duration]</td>
                    <td>$row[releaseDate]</td>
                    <td>$row[genre]</td>
                    <td><form action='delete.php' method='post'><input type='hidden' name='tvID' value='<$row[tvID]'><input type='submit' value='X'></form></td>
                    <td><form action='update.php' method='post'><input type='hidden' name='tvID' value='<$row[tvID]'><input type='submit' value='Update'></form></td>
                    </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
