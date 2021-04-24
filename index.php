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

    <div class="d-flex justify-content-between align-items-center min-vh-100">
      <div class="container mx-auto">
        <div class="row">
          <div class="col align-self-center">
            <div class="mx-auto" style="width: 900px;">
              <div class="row mb-4">
                <div class="col">
                  <h3 class="lh-lg fs-3">Prouduk List</h3>
                </div>
                <div class="col text-end">
                  <a href="tambah_produk.php" class="btn btn-primary">Tambah Data Produk</a>
                </div>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Keterangan Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  // select data 

                  $sql = "SELECT * from produk order by id desc";
                  $result = $conn->query($sql);

                  $no = 1;
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <th scope="row"><?= $no;?></th>
                    <td><?= $row["nama_produk"] ?></td>
                    <td><?= $row["keterangan_produk"] ?></td>
                    <td><?= $row["harga_produk"] ?></td>
                    <td><?= $row["jumlah_produk"] ?></td>
                    <td>
                      <a href="edit_produk.php?id=<?= $row['id']; ?> "class="btn btn-primary">Edit</a>
                      <a href="hapus_data.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah data ini mau dihapus ?');" class="btn btn-primary">Hapus</a>
                    </td>
                  </tr>
                  <?php
                      $no++;
                    }
                  } else {
                    echo "Data tidak ada";
                  }

                  ?>
                  
                </tbody>
              </table>              
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