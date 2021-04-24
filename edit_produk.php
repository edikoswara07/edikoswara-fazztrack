<?php

require_once "./conn.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Edi Koswara Fazztrack</title>
  </head>
  <body>

  <?php

  		$id = $_GET['id'];


  		$selectData = "SELECT * FROM produk WHERE id  = $id";
  		$result = $conn->query($selectData);




  ?>    

    <div class="d-flex justify-content-between align-items-center min-vh-100">
      <div class="container mx-auto">
        <div class="row">
          <div class="col align-self-center">
            <div class="mx-auto" style="width: 900px;">
              <div class="row mb-4">
                <div class="col">
                  <h3 class="lh-lg fs-3">Tambah Prouduk</h3>
                </div>
                <div class="col text-end">
                  <a href="index.php" class="btn btn-primary">Kembali</a>
                </div>
              </div> 
                <form class="row g-3" name="update" action="edit_produk.php?id=<?=$id;?>" method="POST">
                <?php
               		while($row = $result->fetch_assoc()) {
  							?>
                  <div class="col-md-6">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama" value="<?= $row['nama_produk']; ?>">
                  </div>
                  <div class="col-md-6">
                    <label for="keterangan_produk" class="form-label">Keterangan Produk</label>
                    <input type="text" class="form-control" id="keterangan_produk" name="keterangan" value="<?= $row['keterangan_produk']; ?>">
                  </div>
                  <div class="col-6">
                    <label for="harga_produk" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" id="harga_produk" name="harga" value="<?= $row['harga_produk']; ?>">
                  </div>
                  <div class="col-6">
                    <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                    <input type="text" class="form-control" id="jumlah_produk" name="jumlah" value="<?= $row['jumlah_produk']; ?>">
                  </div>
                <?php
               		}
               	?>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="update">Ubah Data</button>
                  </div>
                </form>
                <?php          
						      if(isset($_POST['update'])) {
						          
						          $nama = $_POST['nama'];
						          $keterangan = $_POST['keterangan'];
						          $harga = $_POST['harga'];
						          $jumlah = $_POST['jumlah'];

						          $sql = "UPDATE produk SET nama_produk = '$nama', keterangan_produk = '$keterangan', harga_produk = '$harga', jumlah_produk = '$jumlah'  WHERE id = $id";

						          if ($conn->query($sql) === TRUE) {
						            echo "Berhasil update data produk";
						           ?>
						           	<meta http-equiv="refresh" content="1">
						           <?php
						          } else {
						            echo "Error: " . $sql . "<br>" . $conn->error;
						          }
						        }
					      ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>