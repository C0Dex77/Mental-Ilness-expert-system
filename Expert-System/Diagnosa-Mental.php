<?php
include 'Connection.php'
?>
<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Diagnosa</title>
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

            .centang_gejala{
                background-color: darkcyan;
                font-size: medium;
                color: #fff;
                font-family: serif;
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
    </head>
    <body>
        <h3 style="text-align: center;">Harap pilih gejala yang anda rasakan (minimal 3)</h3>
        <div id="centang_gejala">
        <form method="POST" action="hasil-diagnosa.php" style="align-content: center;">
        <?php $ambil=mysqli_query($connection,"SELECT * FROM gejala"); $no=1;?>
        <table align="center">
        <?php while($pecah = mysqli_fetch_assoc($ambil)){?>
            <tr>
                <td><input type="checkbox" name="id_gejala[<?php echo $pecah['id_gejala'] ?>]" id="<?php echo 'ya' . $pecah['id_gejala'] ?>" value ="<?php echo $pecah['nilai_belief'];?>"><?php echo $pecah['nama_gejala'];?></td>
            </tr>
            <?php } ?>
            <tr>
                <td><input type="submit" class="submit" name="submit" id="submit" value="mulai Diagnosa" style="margin-top: 10px; padding-left:20px; padding-right:20px; border-radius:15px"></td>
            </tr>
        </table>
        </form>
    </div>
    
    </body>
</html>