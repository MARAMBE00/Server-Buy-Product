<?php
if (isset($_SESSION['userid']))
{
// echo '<i class="fa-solid fa-user"></i>';
echo "<p style='float: right'><b>".$_SESSION['fname']." ".$_SESSION['sname']." | User type: ".$_SESSION['usertype']."</b></p>";
}
?>