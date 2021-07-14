<!DOCTYPE html>
<html>
    <head>
        <title>Status daftar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php
        include "Connection.php";
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];
        $sql="INSERT INTO Login(Email,Password) VALUES ('$Email','$Password')";
        $hasil=mysqli_query($connection,$sql);
        if ($hasil) {
            echo "Berhasil simpan data anggota";
            exit;
  }
  else {
    echo "Gagal simpan data anggota";
    exit;
}
?>
</body>
</html>