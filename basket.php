<?php
session_start();

include("db.php");

$pagename = "smart basket"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>" . $pagename . "</title>"; 

echo "<body>";

include ("headfile.html");

echo "<h4>" . $pagename . "</h4>"; 

if (isset($_POST['del_prodid'])) {
    $delprodid = $_POST['del_prodid'];
    unset ($_SESSION['basket'][$delprodid]);
    //header("Refresh:0");
    echo "<p><b>1 item removed from the basket</b>";
}

$total = 0;

if (isset($_POST['h_proid'])) {
    $newprodid = $_POST['h_proid'];
    $reququantity = $_POST['p_quantity'];

    // echo "<p>ID of selected product: ".$newprodid;
    // echo "<p>Quantity of selected product: ".$reququantity;

    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p><b>1 item added to the basket</b>";
} else {
    //echo "<p><b>Basket unchanged</b>";
}
echo "<table id='baskettable'>
<tr>
    <th>Product Name</th> 
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Remove Product</th>
</tr>";

if (isset($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $index => $value) {
        $SQL = "select prodId, prodName, prodPrice
        from product 
        where prodId=".$index;
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);

        echo "<tr>"; 
        echo "<td>" . $arrayp['prodName'] . "</td>";
        echo "<td>&pound" . number_format($arrayp['prodPrice'], 2) . "</td>";
        echo "<td style='text-align:center;'>" . $value . "</td>";
        $subtotal = $arrayp['prodPrice'] * $value;
        echo "<td>&pound" . number_format($subtotal, 2) . "</td>";
        $total = $total + $subtotal;
        echo "<form action='basket.php' method='post'>";
        echo "<td>";
        echo "<input type=submit value='Remove' id='submitbtn'>";
        echo "</td>";
        echo "<input type=hidden name=del_prodid value=".$arrayp['prodId'].">";
        echo "</form>";
        echo "</tr>";    
        
    }
    
} 
else {
    echo "<P><b>Empty basket</b>";
}
echo "<tr>";
echo "<td colspan=4><b>TOTAL</b></td>";
echo "<td><b>&pound" . number_format($total, 2) . "</b></td>";
echo "</tr>";
echo "</table>";

echo "<br><p><a href='clearbasket.php'>CLEAR BASKET</a></p>";
echo "<br><p>New homteq customers: <a href='signup.php'>Sign up</a></p>";
echo "<br><p>Returning homteq customers: <a href='login.php'>Log In</a></p>";

include "footfile.html"; 

echo "</body>";
?>