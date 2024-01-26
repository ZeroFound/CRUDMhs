<?php 

include 'config.php';


if(isset($_POST['bsimpan']))
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE tmhs set
											 	nim = '$_POST[tnim]',
											 	nama = '$_POST[tnama]',
												alamat = '$_POST[talamat]',
											 	prodi = '$_POST[tprodi]'
											 WHERE id_mhs = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
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
		
		if(isset($_GET['hal']))
		
			//Pengujian jika edit Data
			if($_GET['hal'] == "edit")
			{
				//Tampilkan Data yang akan diedit
				$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
				$data = mysqli_fetch_array($tampil);
				if($data)
				{
					//Jika data ditemukan, maka data ditampung ke dalam variabel
					$vnim = $data['nim'];
					$vnama = $data['nama'];
					$valamat = $data['alamat'];
					$vprodi = $data['prodi'];
				}
			}

		
	

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Edit Data</title>
</head>
<body>
<div class="container">
	<h2 class="text-center">&copy;AWS</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-warning text-white text-center border border-dark"><img src="gambar/data.png" width="30" height="30">
	    Edit Data Mahasiswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nim</label>
	    		<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control border border-dark" placeholder="Input Nim anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control border border-dark" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control border border-dark" name="talamat"  placeholder="Input Alamat anda disini!"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Program Studi</label>
	    		<select class="form-control border border-dark" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
	    			<option value="D3-MI">D3-MI</option>
	    			<option value="S1-SI">S1-SI</option>
	    			<option value="S1-TI">S1-TI</option>
	    		</select>
	    	</div>

	    	<a href="edit.php?hal=edit&id=<?=$data['id_mhs']?>"><button type="submit" class="btn btn-success border border-dark" name="bsimpan">Simpan<img src=""  width="" height=""></button></a>

	    </form>
	  </div>
	</div>
	

</body>
</html>