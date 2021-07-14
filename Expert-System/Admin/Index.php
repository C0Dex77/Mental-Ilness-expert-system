<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>status Login</title>
</head>

<body>
<style>
    body{
                font-family: serif;
                background-color: whitesmoke;
                background-repeat: no-repeat;
                background-size: cover;

            }
            nav {
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
<h1 style="text-align: center;">Berhasil masuk</h1>
<br />

<?php
session_start();

if($_SESSION['status']!='login'){
    header("location:../Index.php?pesan=belum_login");
}
?>

<h2 style="text-align: center;"> Selamat datang, <?php echo $_SESSION['Email']; ?> anda telah login.</h2>

<br />
<br />

<a href="logout.php" style="text-align: center;">Logout</a>


</body>
</html>