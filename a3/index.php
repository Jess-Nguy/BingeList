<?php
//Start session.
session_start();
?>
<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: login page to get user input of username and password.
-->
<html>
    <head>
        <title>Assignment 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            form{   
                font-family: Arial, Impact, Trebuchet MS; 
                margin-left: 250px;
                margin-right: 950px;
                margin-top: 80px;
                padding-left: 25px;
                padding-right:25px;
                padding-bottom: 25px;
                padding-top:10px;
                border: 2px solid #D1CCB9;  
                background-color: #D1CCB9; 
                border-radius: 2px;
            }
            body{
                background-image: url(images/asoue.jpg);
                background-size: cover;
                background-repeat: no-repeat, repeat;
                padding: 15px;
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
            input[type="text"]{
                width: 230px;
            }
            figure{
                margin: 0px;
            }
            .logo{
                width:200px;
                height:50px;                
            }

        </style>
    </head>
    <body>     
        <?php
        //Set loggedIn to false because user and password is not valid.
        $_SESSION["loggedIn"] = false;
        ?>
        <!--Website logo image-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
        <!--Form to get user input of username and password.-->
        <form action="validate.php" method="post">
            <h3>Sign In</h3>
            User name: <input type ="text" name="userName"> <br/><br/>
            Password: <input type ="text" name="password"><br/><br/>
            <input type ="submit" value="Sign In">
        </form>
    </body>
</html>
