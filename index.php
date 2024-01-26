<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
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
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
										  VALUES ('$_POST[tnim]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[talamat]', 
										  		 '$_POST[tprodi]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
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
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
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
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
  <link rel="icon"  href="gambar/index.png">
</head>
<body>
<div class="container">

	<h1 class="text-center">Pendaftaran Mahasiswa</h1>
	<h2 class="text-center">&copy;AWS</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white border border-dark text-center"><img src="gambar/form.png" alt="" width="40" height="40">
	    Input Data Mahasiswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nim</label>
	    		<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control border border-dark" placeholder="Input Nim anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control border border border-dark" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control border border border-dark" name="talamat"  placeholder="Input Alamat anda disini!"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Program Studi</label>
	    		<select class="form-control border border border-dark" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?> Pilih Jurusan</option>
	    			<option value="D3-MI">D3-MI</option>
	    			<option value="S1-SI">S1-SI</option>
	    			<option value="S1-TI">S1-TI</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success border border-dark" name="bsimpan">Simpan<img src="gambar/save.gif"  width="35" height="35"></button>
	    	<button type="reset" class="btn btn-danger border border-dark" name="breset">Kosongkan<img src="gambar/empty.gif"  width="35" height="35"></button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success border border-dark text-white text-center"><img src="gambar/files.png" alt="" width="40" height="40">
	    Daftar Mahasiswa
	  </div>
	  <div class="card-body">
	    <div class="col-md-6 mx-auto">
			<form action="index.php" method="POST">
				<div class="input-group mb-3">
				<input type="text" name="tcari" value="<?=@$vtcari?>" class="form-control border border-dark" placeholder="Masukan Kata Kunci!">
					<button class="btn-outline-primary" name="bcari" type="submit">Cari<img src="gambar/search.gif"  width="35" height="35"></button></a>
					<button class="btn-outline-danger" name="breset" type="reset">reset<img src="gambar/undo.png"  width="35" height="35"></button>
				</div>
			</form>
		</div>
	    <table class="table table-bordered table-striped " border="1">
	    	<tr>
	    		<th class="text-center border border-3 border border-dark">No.</th>
	    		<th class="text-center border border-3 border border-dark">Nim</th>
	    		<th class="text-center border border-3 border border-dark">Nama</th>
	    		<th class="text-center border border-3 border border-dark">Alamat</th>
	    		<th class="text-center border border-3 border border-dark">Program Studi</th>
	    		<th class="text-center border border-3 border border-dark">Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;

				
				if(isset($_POST['bcari'])){
					$keyword = $_POST['tcari'];
					$q = "SELECT * FROM tmhs WHERE nama like '%$keyword%'  order by id_mhs asc";
				}else{
					$q = "SELECT * from tmhs order by id_mhs asc";
				}
	    		$tampil = mysqli_query($koneksi, $q);
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td class="text-center border border-dark"><?=$no++;?></td>
	    		<td class="text-center border border-dark"><?=$data['nim']?></td>
	    		<td class="text-center border border-dark"><?=$data['nama']?></td>
	    		<td class="text-center border border-dark"><?=$data['alamat']?></td>
	    		<td class="text-center border border-dark"><?=$data['prodi']?></td>
	    		<td>
	    			<a href="edit.php?hal=edit&id=<?=$data['id_mhs']?>" 
						onclick="return confirm('Apakah ingin edit data ini?')" class="btn btn-warning border border-dark"> Edit<img src="gambar/edit.gif"  width="35" height="35"></a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_mhs']?>" 
	    			   onclick="return confirm('Apakah ingin menghapus data ini?')" class="btn btn-danger border border-dark"> Hapus<img src="gambar/trash.gif"  width="35" height="35"></a>
	    		</td>
	    	</tr>
	    <?php endwhile;  ?>
		<div>
		<a href="cetak.php" target="_blank">
		<button class="btn btn-outline-info ">Cetak<img src="gambar/printer.gif"  width="35" height="35"></button></a>
		<a href="excel.php" target="_blank">
		<button class="btn btn-outline-warning">Excel<img src="gambar/excel.png"  width="35" height="35"></button></a>
		<a href="pdf.php" target="_blank">
		<button class="btn btn-outline-danger">Pdf<img src="gambar/pdf.png"  width="35" height="35"></button></a>
		</div>
		<span></span>
		<div>
		</div>
	    </table>
		
	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>