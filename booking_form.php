<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $NoID = mysqli_real_escape_string($conn, $_POST['No_ID']);
   $namaLengkap = mysqli_real_escape_string($conn, $_POST['Nama_Lengkap']);
   $Destinasi = mysqli_real_escape_string($conn, $_POST['Destinasi']);
   $JumlahPesanan = mysqli_real_escape_string($conn, $_POST['Jumlah_Pesanan']);
   $BulanKeberangkatan = mysqli_real_escape_string($conn, $_POST['Bulan_Keberangkatan']);
   $NoHP = mysqli_real_escape_string($conn, $_POST['No_HP']);
   $Email = mysqli_real_escape_string($conn, $_POST['Email']);

   $query = "INSERT INTO order_form (`noID`, `nama`, `destinasi`, `jumlahPemesanan`, `bulanKeberangkatan`, `noHP`, `email`) 
   VALUES ('$NoID', '$namaLengkap', '$Destinasi', '$JumlahPesanan', '$BulanKeberangkatan', '$NoHP', '$Email')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" autocomplete="off">
      <h3>Booking Form</h3>

      <input type="text" name="No_ID" required placeholder="No ID">
      <input type="text" name="Nama_Lengkap" required placeholder="Nama Lengkap">
      <input type="text" name="Destinasi" required placeholder="Destinasi">
      <input type="text" name="Jumlah_Pesanan" required placeholder="Jumlah Pesanan">
      <input type="text" name="Bulan_Keberangkatan" required placeholder="Bulan Keberangkatan">
      <input type="text" name="No_HP" required placeholder="No HP">
      <input type="email" name="Email" required placeholder="Email">
      <input type="submit" name="submit" value="Book now" class="form-btn" onclick="loadScript()">
   </form>
</div>
<script>
  function loadScript() {
    var script = document.createElement('script');
    script.src = 'Javascript.js';
    document.body.appendChild(script);
  }
</script>

</body>
</html>

