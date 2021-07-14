<!DOCTYPE html>

<html>
    
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
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
        <h2 style="text-align: center;">Silahkan daftar diri anda</h2>

            <form action="Cek_register.php" method="POST" align="center">
            <table align="center">
                <tr>
                    <td><b>Masukkan Email</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="Email" required></td>
                </tr>
                <tr>
                    <td><b>Masukkan password</b></td>
                </tr>
                <tr>
                    <td><input type="password" name="Password" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" style="border-radius : 15px; padding-left:15px; padding-right:15px; border-style:none; background-color:cadetblue; color:white;"></td>
                </tr>
            </table>
            <p align ="center">Sudah punya akun? <a href="https://kelompok12.net/Expert-System/Index.php"><b>klik disini</b></a>
        </form>
    </body>
</html>