<?php
session_start();



$servername = "localhost";
$database = "u797100727_Zenith_Tuition";
$username = "u797100727_zenithtuition";
$password = "B1i?!^6^g=#wl^U6V]sUnx9X43";

$conn = mysqli_connect($servername, $username, $password, $database);


if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $month=$_POST['month'];
    $roll=$_POST['roll'];
    $payment_status='pending';
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"insert into payment(name,amount,roll,month,payment_status,added_on) values('$name','$amt','$roll','$month','$payment_status','$added_on')");
    $_SESSION['OID']=mysqli_insert_id($conn);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($conn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>