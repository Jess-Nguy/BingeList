<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: Error page for when the user tries to skip the login and go to other pages.
-->
<?php
//Start/resume session.
session_start();
?>

<html>
    <head>
        <title>Error page</title>
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
                margin-left: 125px;
            }
            .button:hover {
                background-color: white; 
                color: black; 
                border: 2px solid #2681B6;
            }
            h2{
                margin-top:25px;
                margin-left: 125px;
                color: white;
                font-family: Arial, Impact, Trebuchet MS;
            }
            body{
                background-image: url(images/breakingbad.jpg);
                background-size: cover;
                background-repeat: no-repeat, repeat;
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <!--Website logo image.-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
         <!--Error message.-->
        <h2>ERROR! NO LOGIN!</h2><br>
        <!--Back button to return back to main page.-->
        <a href="index.php" class="button">Go to Login</a>
    </body>
</html>
