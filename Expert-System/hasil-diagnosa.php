<!DOCTYPE html>
<head>
    <title>
        hasil Diagnosa anda
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
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
        </style>
        <nav>
            <ul>
            <li><a href="https://kelompok12.net/Expert-System/Landing-page.html">Home</a></li>
                <li><a href="https://kelompok12.net/Expert-System/About-us.html">About Us</a></li>
                <li><a href="https://kelompok12.net/Expert-System/Register.php">Register</a> </li>
                <li><a href="https://kelompok12.net/Expert-System/Index.php">Login</a></li>
            </ul>
        </nav>
    <table>
        <thead>
            <tr>
                <th style="width: 10%">No</th>
                <th style="width: 20%">Kode Gejala</th>
                <th style="width: 60%">Nama Gejala</th>
                <th style="width: 10%">Nilai belief</th>
            </tr>
        </thead>
					<tbody>
					<?php 
                    include 'Connection.php' 
                    ?>

					<?php
						$pilihan_user = [];
						$no = 1;
						foreach ($_POST['id_gejala'] as $key => $value) {
							if($value > 0):
								$result = mysqli_query($connection,"SELECT * FROM gejala WHERE id_gejala='".$key."'");
								while($row = mysqli_fetch_array($result)):
									echo "<tr>";
									echo "<td>" . $no . "</td>";
									echo "<td>" . $row['kode_gejala'] . "</td>";
									echo "<td>" . $row['nama_gejala'] . "</td>";
									echo "<td>" . $row['nilai_belief'] . "</td>";

									$no+=1;
								endwhile;
							endif;
						}
					?>
					</tbody>
				</table>
			</div>
			<hr style="border-top: 2px solid black;">

			<?php
				if(isset($_POST['submit'])) {
					$pilihan_user = [];
					foreach ($_POST['id_gejala'] as $key => $value) {
						if($value > 0):
							$pilihan_user[] = $key;
						endif;
					}

					$sql = "SELECT GROUP_CONCAT(Penyakit.kode_penyakit),gejala.nilai_belief FROM rule JOIN Penyakit ON rule.id_penyakit = Penyakit.id_penyakit JOIN gejala ON rule.id_gejala = gejala.id_gejala WHERE rule.id_gejala IN (".implode(',',$pilihan_user).") GROUP BY rule.id_gejala";
					$result=mysqli_query($connection,$sql);
					$gejala=array();
					while($row=mysqli_fetch_row($result)){
						$gejala[]=$row;
					}
					
					$sql="SELECT GROUP_CONCAT(Penyakit.kode_penyakit) FROM Penyakit";
					$result=mysqli_query($connection,$sql);
					$row=mysqli_fetch_row($result);
					$fod=$row[0];
					
					$densitas_baru=array();
					while(!empty($gejala)){
						$densitas1[0]=array_shift($gejala);
						$densitas1[1]=array($fod,1-$densitas1[0][1]);
						$densitas2=array();
						if(empty($densitas_baru)){
							$densitas2[0]=array_shift($gejala);
						}else{
							foreach($densitas_baru as $k=>$r){
								if($k!="&theta;"){
									$densitas2[]=array($k,$r);
								}
							}
						}
						$theta=1;
						foreach($densitas2 as $d) $theta-=$d[1];
						$densitas2[]=array($fod,$theta);
						$m=count($densitas2);
						$densitas_baru=array();
						for($y=0;$y<$m;$y++){
							for($x=0;$x<2;$x++){
								if(!($y==$m-1 && $x==1)){
									$v=explode(',',$densitas1[$x][0]);
									$w=explode(',',$densitas2[$y][0]);
									sort($v);
									sort($w);
									$vw=array_intersect($v,$w);
									if(empty($vw)){
										$k="&theta;";
									}else{
										$k=implode(',',$vw);
									}
									if(!isset($densitas_baru[$k])){
										$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
									}else{
										$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
									}
								}
							}
						}
						foreach($densitas_baru as $k=>$d){
							if($k!="&theta;"){
								$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
							}
						}
					}
					
					unset($densitas_baru["&theta;"]);
					arsort($densitas_baru);
					
					$codes=array_keys($densitas_baru);
					$sql="SELECT * FROM Penyakit WHERE kode_penyakit IN('{$codes[0]}')";
					$result=mysqli_query($connection,$sql);
					$row=mysqli_fetch_row($result);
                    echo '<h4>Berikut Hasil Diagnosa anda!</h4>';
                    echo "Anda kemungkinan mengidap penyakit <b>{$row[1]}</br> dengan persentasi kemungkinan ".round($densitas_baru[$codes[0]],2)." % <br>";
					echo "'<a href=https://kelompok12.net/Expert-System/Diagnosa-Mental.php>Klik disini untuk Melakukan diagnosa ulang</a>'";                  
            } 
			?>
    
</body>
</html>