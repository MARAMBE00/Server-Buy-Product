<?php
$pagename = "sign up"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include ("headfile.html"); 

echo "<h4>" . $pagename . "</h4>"; 

echo "<form action='signup_process.php' method='post'>";
echo "<table style='border: 0px'>";
echo "<tr><td style='border: 0px'>First name:</td>";
echo "<td style='border: 0px'><input type=text name=fname size=35></td></tr>";
echo "<tr><td style='border: 0px'>Last name:</td>";
echo "<td style='border: 0px'><input type=text name=lname size=35></td></tr>";
echo "<tr><td style='border: 0px'>Address:</td>";
echo "<td style='border: 0px'><input type=text name=address size=35></td></tr>";
echo "<tr><td style='border: 0px'>Postcode:</td>";
echo "<td style='border: 0px'><input type=text name=postcode size=35></td></tr>";
echo "<tr><td style='border: 0px'>Tel No:</td>";
echo "<td style='border: 0px'><input type=text name=telno size=35></td></tr>";
echo "<tr><td style='border: 0px'>Email Address:</td>";
echo "<td style='border: 0px'><input type=text name=email size=35></td></tr>";
echo "<tr><td style='border: 0px'>Password:</td>";
echo "<td style='border: 0px'><input type=password name=password maxlength=10 size=35></td></tr>";
echo "<tr><td style='border: 0px'>Confirm password:</td>";
echo "<td style='border: 0px'><input type=password name=compassword maxlength=10 size=35></td></tr>";
echo "<tr>";
echo "<td style='border: 0px'><input type=submit value='Sign up' name='submitbtn' id='submitbtn'></td>";
echo "<td style='border: 0px'><input type=reset value='Clear Form' name='submitbtn' id='submitbtn'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

include "footfile.html"; //include head layout

echo "</body>";
?>