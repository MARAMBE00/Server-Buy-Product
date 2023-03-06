<?php

session_start();

include('db.php');
mysqli_report(MYSQLI_REPORT_OFF);

$pagename = "sign up results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include "headfile.html"; 

echo "<h4>" . $pagename . "</h4>";

$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$address = trim($_POST['address']);
$postcode = trim($_POST['postcode']);
$telno = trim($_POST['telno']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$compassword = trim($_POST['compassword']);

//check if any of the variables that captured the posted values are empty
if (!empty($fname) and !empty($lname) and !empty($address) and !empty($postcode) and !empty($telno) and !empty($email) and !empty($password) and 
!empty($compassword)) {
        //if the 2 entered passwords do not match
        if ($password<>$compassword) {
                echo "<p><b>Your sign-up failed!</b></p>";
                echo "<br><p>The two passwords are not matching.</p>";
                echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
        }
        else{
                //create a regular expression variable
                $reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

                //if the email does not match the regular expression
                if (preg_match($reg, $email)) {
                        $SQL = "insert into Users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
                        values ('A', '".$fname."', '".$lname."', '".$address."', '".$postcode."', '".$telno."', '".$email."', '".$password."')";

                        //if SQL execution is correct
                        if (mysqli_query($conn, $SQL)){
                                echo "<p><b>Sign-up Complete</b></p>";
                                echo "<br><p>Go to Log In Page: <a href=login.php>Log In</a></p>";
                        }
                        else {
                                echo "<p><b>Your sign-up failed!</b></p>";
                                echo "<br><p>SQL Error No: ".mysqli_errno($conn)."</p>"; //Retrieve the error number and display. 
                                //echo "<p>SQL Error Msg: ".mysqli_error($conn)."</p>"; //Retrieve the error message and display. 
                        
                                //if the error detector returned the number 1062, 
                                //the unique constraint is violated as the user entered an email which already existed
                                if (mysqli_errno($conn)==1062){
                                        echo "<br><p>An account with your e-mail address is already registered.</p>";
                                        echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
                                }
                                //error code for inserting character that is problematic for SQL query
                                if (mysqli_errno($conn)==1064){
                                        echo "<br><p>Invalid characters used.<br>";
                                        echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
                                }
                        }
                }
                else{
                        echo "<p><b>Your sign-up failed!</b></p>";
                        echo "<br><p>Please insert your e-mail address correctly.</p>";
                        echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
                }
        }
}
else{
        echo "<p><b>Your sign-up failed!</b></p>";
        echo "<br><p>All the mandatory fields need to be filled in.</p>";
        echo "<br><p>Go back to: <a href=signup.php>sign up</a></p>";
}

include "footfile.html"; //include head layout

echo "</body>";
