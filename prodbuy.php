<?php
include ("db.php");

$pagename = "a smart buy for a smart home"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";
include "headfile.html"; 
echo "<h4>" . $pagename . "</h4>";

//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable applied to the query
//string u_prod_id store the value in a local variable called $prodid
$prodid = $_GET['u_prod_id'];

//display the value of the product id, for debugging purposes
//echo "<p>Selected product Id: ".$prodid;

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL = "select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity
        from product
        where prodId=" . $prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));

$arrayp = mysqli_fetch_array($exeSQL);

echo "<table style='border: 0px'>";
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=" . $arrayp['prodId'] . ">";
echo "<img src=images/" . $arrayp['prodPicNameLarge'] . " height=350 width=350>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>" . $arrayp['prodName'] . "</h5></p>"; 
echo "<br><p>" . $arrayp['prodDescripLong'] . "</p>";
echo "<br><p><b>&pound" . $arrayp['prodPrice'] . "</b></p>";
echo "<br><p>Left in Stock: " . $arrayp['prodQuantity'] . "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<p>Number to purchased: ";
//create form made of one text field and one button for user to enter quantity the value entered in the form will be posted to
//the basket.php to be processed
echo "<form action=basket.php method=post>";
//echo "<input type=text name=p_quantity size=5 maxlength=3>";
echo "<select name=p_quantity>";
for ($i = 1; $i <= $arrayp['prodQuantity']; $i++) {
    echo "<option value=" . $i . ">" . $i . " </option>";
}
echo "</select>";
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_proid value=" . $prodid . ">";
echo "</form>";
echo "</p>";

include "footfile.html";

echo "</body>";