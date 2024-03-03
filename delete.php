<?php require_once("connect.php");
$id = $_GET['id'];
$res = mysqli_query($connection, "SELECT* from image_table WHERE id=$id limit 1");
if ($row = mysqli_fetch_array($res)) {
    $deleteimage = $row['image'];
}
$folder = "uploads/";
unlink($folder . $deleteimage);
$result = mysqli_query($connection, "DELETE from image_table WHERE id=$id");
if ($result) {
    header("location:dsh_dp.php?action=deleted");
}
