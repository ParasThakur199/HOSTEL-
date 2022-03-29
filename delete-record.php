<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$dd=$_GET['editid'];
// print_r($dd);
$sql = "DELETE FROM tblvisitor WHERE  ID='" . $_GET['editid'] . "'";

if (mysqli_query($con, $sql)) { ?>
    <script>
   <a href="manage-newvisitors.php" onClick="alert('Record Deleted Successfully!')"><img title="The Link" /></a></script>
<?php } else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>