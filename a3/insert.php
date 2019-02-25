<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: insert new row to database page.
-->
<?php
//Start/resume session.
session_start();
//Connect to database.
include "connect.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert page</title>
        <style>
            form{
                font-family: Arial, Impact, Trebuchet MS; 
                color:white;
                margin-top: 180px;
                text-align:center;
            }
            body{
                background-image: url(images/daredevil.jpg);
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
                cursor: pointer;
                border-radius: 5px;
            }
            .button:hover {
                background-color: white; 
                color: black; 
                border: 2px solid #2681B6;
            }
            input[type="submit"]{
                background-color: #FE1919;
                border-color: #FE1919;
                font-size: 16px;
                color: white;
                padding-left:90px;
                padding-right:90px;
                padding-top:10px;
                padding-bottom: 10px;
            }
            h2{
                margin-top: -300px;
                margin-left: 625px;
                color: white;
                font-family: Arial, Impact, Trebuchet MS;
            }

        </style>
    </head>
    <body>
        <?php
        //Back button to return back to main page.
        echo"<a href='main.php' class='button'>Back</a>";
        //Check if user name and password was inserted and valid. To reject those who skip login.
        if (($_SESSION["loggedIn"]) == false) {
            header('Location: error.php');
            exit();
        } else {
            //A form to get user to input what to insert into database.
            echo"<form action='$_SERVER[PHP_SELF]' method='GET'> <br />
            Title: <input type ='text' name='title'><br/><br/>
            Main Character: <input type ='text' name='mainCharacter'><br/><br/>
            Actor: <input type ='text' name='actor'><br/><br/>
            Duration: <input type ='text' name='duration'><br/><br/>
            Genre: <input type ='text' name='genre'><br/><br/>
            <input type ='submit' name='submit' value='Insert'>
        </form>";

            //Check if the submit button was clicked to run SQL command to insert row into database.
            if (isset($_GET['submit'])) {
                //Filtering special chars to protect from SQL injections.
                $title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_SPECIAL_CHARS);
                $mainCharacter = filter_input(INPUT_GET, "mainCharacter", FILTER_SANITIZE_SPECIAL_CHARS);
                $actor = filter_input(INPUT_GET, "actor", FILTER_SANITIZE_SPECIAL_CHARS);
                $duration = filter_input(INPUT_GET, "duration", FILTER_SANITIZE_NUMBER_INT);
                $genre = filter_input(INPUT_GET, "genre", FILTER_SANITIZE_SPECIAL_CHARS);
                
                //SQL command to update database.
                $sql = "INSERT INTO a3_tv_shows (title, mainCharacter, actor, duration, genre) VALUES ('$title', '$mainCharacter', '$actor', '$duration', '$genre')";
                 //Prepare statement.
                $stmt = $dbh->prepare($sql);
                //Execute statement.
                $result = $stmt->execute();
                //Check if statement was executed properly.
                if ($result) {
                    $message = "<h2>Successfully Inserted!</h2>";
                } else {
                    $message = "<h2>Error!</h2>";
                }

                echo "$message";
            }
        }
        ?>

    </body>
</html>
