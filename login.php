<?php
session_start();
$pagename = "login"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 

echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>" . $pagename . "</h4>"; 

echo "<form action='login_process.php' method='post'>";
echo "<table id='baskettable'>";
echo "<tr>";
echo "<td>Email:</td>";
echo "<td><input type=text name=email size=40></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Password:</td>";
echo "<td><input type=password name=password size=40></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input type=reset value='Clear Form' id='submitbtn'></td>";
echo "<td><input type=submit value='Login' id='submitbtn'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

include "footfile.html";

echo "</body>";
?>