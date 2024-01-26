<?php 
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cetak Data</title>
</head>
<body>
   
   <div class="card mt-3">
	  <div class="card-header bg-info text-white border border-dark text-center">
	    DATA MAHASISWA
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered  table-striped"  border="1">
	    	<tr>
	    		<th class="text-center border border-dark">No.</th>
	    		<th class="text-center border border-dark">Nim</th>
	    		<th class="text-center border border-dark">Nama</th>
	    		<th class="text-center border border-dark">Alamat</th>
	    		<th class="text-center border border-dark">Program Studi</th>
	    	
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td class="text-center border border-dark"><?=$no++;?></td>
	    		<td class="text-center border border-dark"><?=$data['nim']?></td>
	    		<td class="text-center border border-dark"><?=$data['nama']?></td>
	    		<td class="text-center border border-dark"><?=$data['alamat']?></td>
	    		<td class="text-center border border-dark"><?=$data['prodi']?></td>
	    		
	    
	    		
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
        <form action="" method="post">
		<button name="pdf" class="btn btn-outline-info ">Cetak Pdf<img src="gambar/pdf.png"  width="35" height="35"></button></a>
        <?php 
       if(isset($_POST['pdf'])){
        header("location:tpdf.php");
    }
         
        ?>
         </form> 
	  </div>
	</div>
   
</body>
</html>