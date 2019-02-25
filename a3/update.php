<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: update database information page.
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
        <title>Update page</title>
        <style>
            form{
                font-family: Arial, Impact, Trebuchet MS;                 
                text-align:center;
            }
            body{
                background-image: url(images/chuck.jpg);
                background-size: cover;
                background-repeat: no-repeat, repeat;
            }
            h2{
                margin-top: -335px;
                margin-left: 700px;
                color: #FE1919;
                font-family: Arial, Impact, Trebuchet MS;
            }
            input[type="submit"]{
                background-color: #09C441;
                border-color: #09C441;
                font-size: 16px;
                color: white;
                padding-left:85px;
                padding-right:85px;
                padding-top:10px;
                padding-bottom: 10px;
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
        <!--Back button to return back to main page.-->
        <a href='main.php' class='button'>Back</a>
        <!--Website logo image-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
        <?php
        //Check if user name and password was inserted and valid. To reject those who skip login.
        if (($_SESSION["loggedIn"]) == false) {
            header('Location: error.php');
            exit();
        } else {
            //A form to get user to input what to update.
            echo"<form action='$_SERVER[PHP_SELF]' method='GET'> <br />
                <h3>Update information</h3>
                Title to:  <input type ='text' name='title'><br/><br/>
                Main Character to: <input type ='text' name='mainCharacter'><br/><br/>
                Actor to: <input type ='text' name='actor'><br/><br/>
                Duration to: <input type ='text' name='duration'><br/><br/>
                Genre to: <input type ='text' name='genre'><br/><br/>
                <input type ='submit' name='submit' value= 'Update'>                
            </form>";
            //Check if the submit button was clicked to run SQL command to update database.
            if (isset($_GET['submit'])) {
                //Filtering special chars to protect from SQL injections.
                $title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_SPECIAL_CHARS);
                $mainCharacter = filter_input(INPUT_GET, "mainCharacter", FILTER_SANITIZE_SPECIAL_CHARS);
                $actor = filter_input(INPUT_GET, "actor", FILTER_SANITIZE_SPECIAL_CHARS);
                $duration = filter_input(INPUT_GET, "duration", FILTER_SANITIZE_SPECIAL_CHARS);
                $genre = filter_input(INPUT_GET, "genre", FILTER_SANITIZE_SPECIAL_CHARS);
                $tvID = filter_input(INPUT_POST, "tvID", FILTER_SANITIZE_SPECIAL_CHARS);

                //SQL command to update database.
                $sql = "UPDATE a3_tv_shows SET title = '$title', mainCharacter = '$mainCharacter', actor='$actor', duration='$duration', genre='$genre' WHERE tvID = '$tvID'";
                //Prepare statement.
                $stmt = $dbh->prepare($sql);
                //Execute statement.
                $result = $stmt->execute();
                //Check if statement was executed properly.
                if ($result) {
                    $message = "<h2>Successfully Updated!</h2>";
                } else {
                    $message = "<h2>Error $tvID message</h2>";
                }
                
                echo "$message";
               
            }
        }
        ?>


    </body>
</html>
