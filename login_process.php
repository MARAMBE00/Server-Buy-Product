<?php

session_start();

include("db.php");

$pagename = "your login results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>" . $pagename . "</h4>"; 

$email = trim($_POST['email']);
$password = trim($_POST['password']);

// echo "Email entered: ".$email;
// echo "<br>Password entered: ".$password;

if (empty($email) or empty($password)){
        echo "<p><b>Login failed!</b></p>";
        echo "<br><p>Login form incomplete.";
        echo "<br>Make sure you provide all the required details.</p>";
        echo "<br><p>Go back to: <a href=login.php>Log In</a></p>";
}
else{

}

include "footfile.html"; 

echo "</body>";
?>