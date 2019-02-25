<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: Checking if user input of username and password were correct page.
-->
<?php
//Start/resume session.
session_start();
?>
<html>
    <head>
        <title>Validation page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                background-image: url(images/asoue.jpg);
                background-size: cover;
                background-repeat: no-repeat, repeat;
                padding: 15px;
            }
            figure{
                margin: 0px;
            }
            .logo{
                width:200px;
                height:50px;                
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
                border-radius: 5px;
            }
            .button:hover {
                background-color: white; 
                color: black; 
                border: 2px solid #2681B6;
            }
            h2{
                margin-top:100px;
                color: white;
                font-family: Arial, Impact, Trebuchet MS;
            }
        </style>
    </head>
    <body>
         <!--Website logo image-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
        <?php
        //Setting correct user name to compare to user inputs.
        $_SESSION["correctUser"] = "Jess";
        //Setting correct password to compare to user inputs.
        $_SESSION["correctPassword"] = "pass123";

        //Filtering special chars to protect from SQL injections.
        $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //Check if username and/or password was null to send back message, allow them to go back and deny access to other pages.
        if (($userName == null || $password == null ) || ($userName == null && $password == null)) {
            $_SESSION["loggedIn"] = false;
            echo "<h2>Username and/or password was not received.</h2><br/>";
            echo "<a href='index.php' class='button'>Back</a>";
        } 
        //Check if username and/or password was wrong to send back message, allow them to go back and deny access to other pages.
        else if (($userName != $_SESSION["correctUser"] || $password != $_SESSION["correctPassword"] ) || ($userName != $_SESSION["correctUser"] && $password != $_SESSION["correctPassword"] )) {
            $_SESSION["loggedIn"] = false;
            echo "<h2>Incorrect username and/or password.</h2> <br/>";
            echo "<a href='index.php' class='button'>Back</a>";
        }
        //Check if username and password was right to send them to main page.
        if ($userName == $_SESSION["correctUser"] && $password == $_SESSION["correctPassword"]) {
            $_SESSION["loggedIn"] = "true";
            header('Location: main.php');
            exit();
        }
        ?>
    </body>
</html>
