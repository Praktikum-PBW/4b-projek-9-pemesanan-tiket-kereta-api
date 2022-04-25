<?php
//koneksi database
$_SERVER ="localhost";
$user ="root";
$pass ="";
$database ="crud";

$koneksi = mysqli_connect($_SERVER, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan di klik
if(isset($_POST['bsimpan']))
{
    //pengujian data
    if($_GET['hal' == "edit"])
    {
        $edit = mysqli_query($koneksi, "UPDATE stasiun set
                                        nama_stasiun='$_POST[tnamastasiun]',
                                        kota ='$_POST[tkota]',
                                        alamat='$_POST[talamat]'
                                        WHERE id_stasiun = '$Get[id]'
                                        ");
    if($edit) //jika sukses
    {
        echo "<script>
        alert('Edit data suksess!');
        document.location='stasiun.php';
     </script>";
    }
    else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='stasiun.php';
				     </script>";
			}
        }
            else
	{
         //data disimpan baru   
    
    $simpan= mysqli_query($koneksi,"INSERT INTO stasiun (id_stasiun,nama_stasiun,kota,alamat)
                                    VALUES ('$_POST[tidstasiun]',
                                    '$_POST[tnamastasiun]',
                                    '$_POST[tkota]',
                                    '$_POST[talamat]')
    ");

    if($simpan) //jika simpan sukses
    {
        echo "<script>
        alert('simpan data sukses');
        document.location='stasiun.php';
        </script>";
    }else
    {
        echo "<script>
        alert('simpan data gagal');
        document.location='stasiun.php';
        </script>";
    }
}
}

	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM stasiun WHERE id_stasiun = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnamastasiun = $data['nama_stasiun'];
				$vkota = $data['kota'];
                $valamat = $data['alamat'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM stasiun WHERE id_stasiun = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='stasiun.php';
				     </script>";
			}
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Stasiun</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
    <h1 class="text-center">Tiket Kereta Api</h1>
    <h2 class="text-center">Pemrograman Berbasis Web</h2>

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Tiket
  </div>
  <div class="card-body">
   <form method="post" action="">
       <div class="form-group mt-3">
           <label>Nama Stasiun</label>
           <input type="text" name="tnamastasiun" value="<?=@$vnamastasiun?>"  class="form-contol" placeholder="input nama stasiun anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Kota</label>
           <input type="text" name="tkota" value="<?=@$vkota?>" class="form-contol" placeholder="input kota anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Alamat</label>
           <textarea class="form-control" name="talamat" placeholder="input alamat anda disini"!><?=@$valamat?></textarea>
       </div>

       <button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
       <button type="reset" class="btn btn-danger mt-3" name="breset">Kosongkan</button>

   </form>
  </div>
</div>


<div class="card mt-3">
  <div class="card-header bg-success text-white">
    Daftar Stasiun
  </div>
  <div class="card-body">

    <table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>Nama Stasiun</th>
            <th>Kota</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no=1;
        $tampil = mysqli_query($koneksi, "SELECT * from stasiun order by id_stasiun desc");
        while($data= mysqli_fetch_array($tampil)):
        
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['nama_stasiun']?></td>
            <td><?=$data['kota']?></td>
            <td><?=$data['alamat']?></td>
            <td>
            <a href="index.php?hal=edit&id=<?=$data['id_stasiun']?>" class="btn btn-warning"> Edit </a>
	    	<a href="index.php?hal=hapus&id=<?=$data['id_stasiun']?>" 
	    	 onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
            </td>
        </tr>

        <?php endwhile; //penutup perulangan ?>

    </table>
  </div>
</div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>