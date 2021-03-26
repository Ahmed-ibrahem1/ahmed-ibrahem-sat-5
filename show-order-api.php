<?php 

include 'connect.php';

if(isset($_GET['orderNumber'])){

$orderNumber = $_GET['orderNumber'];

$sql = " SELECT * FROM `orders` WHERE orderNumber = '$orderNumber' ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


header("content-Type: application/json");
echo json_encode($row);

}
?>