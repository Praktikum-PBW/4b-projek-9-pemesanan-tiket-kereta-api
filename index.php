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
        $edit = mysqli_query($koneksi, "UPDATE tmhs set
                                        no_telp='$_POST[tnotelpon]',
                                        password='$_POST[tpassword]',
                                        nama_lengkap='$_POST[tnamalengkap]',
                                        jenis_kelamin='$_POST[tjeniskelamin]',
                                        tanggal_lahir='$_POST[ttanggallahir]',
                                        alamat='$_POST[talamat]'
                                        WHERE email = '$Get[id]'
                                        ");
    if($edit) //jika sukses
    {
        echo "<script>
        alert('Edit data suksess!');
        document.location='index.php';
     </script>";
    }
    else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
        }
            else
	{
         //data disimpan baru   
    
    $simpan= mysqli_query($koneksi,"INSERT INTO tmhs (email,no_telp,password,nama_lengkap,jenis_kelamin,tanggal_lahir,alamat)
                                    VALUES ('$_POST[temail]',
                                    '$_POST[tnotelpon]',
                                    '$_POST[tpassword]',
                                    '$_POST[tnamalengkap]',
                                    '$_POST[tjeniskelamin]',
                                    '$_POST[ttanggallahir]',
                                    '$_POST[talamat]')
    ");

    if($simpan) //jika simpan sukses
    {
        echo "<script>
        alert('simpan data sukses');
        document.location='index.php';
        </script>";
    }else
    {
        echo "<script>
        alert('simpan data gagal');
        document.location='index.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE email = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnotelpon = $data['no_telp'];
				$vpassword = $data['password'];
				$vnamalengkap = $data['nama_lengkap'];
				$vjeniskelamin = $data['jenis_kelamin'];
                $vtanggallahir = $data['tanggal_lahir'];
                $valamat = $data['alamat'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE email = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
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
    <title>Data Pelanggan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
    <h1 class="text-center">Tiket Kereta Api</h1>
    <h2 class="text-center">Pemrograman Berbasis Web</h2>

    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Pelanggan
  </div>
  <div class="card-body">
   <form method="post" action="">
       <div class="form-group mt-3">
           <label>Email</label>
           <input type="text" name="temail" value="<?=@$vemail?>"  class="form-contol" placeholder="input email anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>No telpon</label>
           <input type="text" name="tnotelpon" value="<?=@$vnotelpon?>" class="form-contol" placeholder="input no telpon anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Password</label>
           <input type="text" name="tpassword" value="<?=@$vpassword?>" class="form-contol" placeholder="input password anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Nama Lengkap</label>
           <input type="text" name="tnamalengkap" value="<?=@$vnamalengkap?>" class="form-contol" placeholder="input nama anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Tanggal Lahir</label>
           <input type="text" name="ttanggallahir" value="<?=@$vtanggallahir?>" class="form-contol" placeholder="input tanggal lahir anda disini!" require>
       </div>
       <div class="form-group mt-3">
           <label>Jenis Kelamin</label>
            <select class="form-control" name="tjeniskelamin">
            <option value="<?=@$vjeniskelamin?>"><?=@$vjeniskelamin?></option>
            <option value=""></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
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
    Daftar Pelanggan
  </div>
  <div class="card-body">

    <table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>Email</th>
            <th>No Telpon</th>
            <th>Password</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no=1;
        $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by email desc");
        while($data= mysqli_fetch_array($tampil)):
        
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['no_telp']?></td>
            <td><?=$data['password']?></td>
            <td><?=$data['nama_lengkap']?></td>
            <td><?=$data['tanggal_lahir']?></td>
            <td><?=$data['jenis_kelamin']?></td>
            <td><?=$data['alamat']?></td>
            <td>
            <a href="index.php?hal=edit&id=<?=$data['email']?>" class="btn btn-warning"> Edit </a>
	    	<a href="index.php?hal=hapus&id=<?=$data['email']?>" 
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