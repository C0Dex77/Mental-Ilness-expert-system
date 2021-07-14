<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Login</title>
</head>
<body>
<style>
    body{
        font-family: serif;
        margin: 0px 0px;
        background-color: whitesmoke;
    }
nav {
                margin:auto;
                text-align: center;
                width :auto;
                font-family: sans-serif;
            }
            nav ul {
                background: darkcyan;
                list-style: none;
                position: relative;
                display: inline-table;
                width: 100%;
            }
            nav ul li{
                float:left;
            }
            nav ul li:hover{
                background: cyan;
            }
            nav ul li:hover a{
                color:#000;
            }
            nav ul li a{
                display: block;
                padding: 20px;
                color: #fff;
                text-decoration: none;
            }

</style>
<nav>
            <ul>
                <li><a href="https://kelompok12.net/Expert-System/Landing-page.html">Home</a></li>
                <li><a href="https://kelompok12.net/Expert-System/About-us.html">About Us</a></li>
                <li><a href="https://kelompok12.net/Expert-System/Register.php">Register</a> </li>
                <li><a href="https://kelompok12.net/Expert-System/Index.php">Login</a></li>
            </ul>
        </nav>
<h2 style="text-align: center;">Silahkan Login</h2>
<br / >
<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == 'gagal'){
        echo "login gagal ! username atau password salah";
    }elseif($_GET['pesan'] == 'logout'){
        echo "anda telah logout ";
    }elseif($_GET['pesan'] == 'belum login'){
        echo "anda harus login dari admin";
    }
}
?>




<br />
<br />
<div>
<form method="POST" action="cek_login.php" align="center">
<table align="center">
<tr>
<td><b>Email</b></td>
<td>:</td>
<td> <input type="text" name="Email" placeholder="masukkan email" style="text-decoration: none;" required></td>
</tr>
<tr>
<td><b>Password</b></td>
<td>:</td>
<td><input type="password" name="Password" placeholder="masukkan password" style="text-decoration: none;" required></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Login" style="border-radius : 15px; padding-left:15px; padding-right:15px; border-style:none; background-color:cadetblue; color:white;"></td>
</tr>
</table>
</form>
<p align="center">belum punya akun? <a href="https://kelompok12.net/Expert-System/Register.php"><b>klik disini</b></a>
</div>

</body>
</html>