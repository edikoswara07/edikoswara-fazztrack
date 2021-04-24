<?php

require_once "conn.php";

$id = $_GET['id'];

$sql = "DELETE FROM produk WHERE id=$id";

if ($conn->query($sql) === TRUE) {

?>
<script>
    alert("Berhasil Hapus data");
</script>
<meta http-equiv="refresh" content="1;url=index.php" />
<?php
} else {
  echo "Error deleting record: " . $conn->error;
}