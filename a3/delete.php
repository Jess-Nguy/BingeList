<!--
Name: Jess Nguyen
Student Number: 000747411
Date Created: October 15, 2018
Authorship: I, Jess Nguyen, 000747411 certify that this material is my 
original work. No other person's work has been used without
due acknowledgement.
Description: Delete row from database page.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete page</title>
        <style>

            body{
                font-family: Arial, Impact, Trebuchet MS;                 
                text-align:center;
                color: white;
                background-image: url(images/spartacus.jpg);
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
            figure{
                margin: 0px;
            }
            .logo{
                width:200px;
                height:50px;
                margin-left:-1250px ;
            }

        </style>
    </head>
    <body>
        <!--Website logo image-->
        <figure>
            <img src="images/a3logobl.png" alt="website logo" class="logo">
        </figure>
        <?php
        //Start/resume session.
        session_start();
        //Connect to database.
        include "connect.php";
        //Check if user name and password was inserted and valid. To reject those who skip login.
        if (($_SESSION["loggedIn"]) == false) {
            header('Location: error.php');
            exit();
        } else {
            //Filters users input of tvID
            $tvID = filter_input(INPUT_POST, "tvID", FILTER_SANITIZE_NUMBER_INT);
            //Display line to user that a certain tvID was deleted from database.
            echo "<h2>Deleted tv ID #$tvID from a3_tv_shows.</h2>";

            //Deletes tv show from the tv database
            $sql = "DELETE FROM a3_tv_shows WHERE tvID = $tvID";
            //Prepares the SQL statement
            $stmt = $dbh->prepare($sql);
            //Executes the SQL statement
            $result = $stmt->execute();
            //Back button to return back to main page.
            echo "<a href='main.php' class='button'>Back</a>";
        }
        ?>
    </body>
</html>