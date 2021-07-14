<?php
session_start();

include 'Connection.php';

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$data = mysqli_query($connection,"SELECT * FROM Login WHERE Email='$Email' and Password='$Password'");

$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['Email'] = $Email;
    $_SESSION['status'] = 'login';
    header("location:Diagnosa-Mental.php");
}else{
    header("location:Index.php?pesan=gagal");
}

?>