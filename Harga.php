<?php
require_once('koneksi.php');
 $id_layanan = $_GET['id_layanan'];
 $sql =mysqli_query($koneksi,"select * from layanan where  id_layanan ='$id_layanan'");
 $row =mysqli_fetch_assoc($sql);
 $row_data['data'] = $row;
 echo json_encode($row_data);
?>