<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="icon" href="Group 2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftar.css">
    <title>Techstore</title>
</head>
<?php
    // include mysql connection
    require './koneksi.php';

    if (isset($_POST['nama']))
    {
        tambah($_POST['nama'], $_POST['nohp'], $koneksi);
    }

  
  function tambah($nama,$nohp,$koneksi) {
      $sql = "insert into tbl_user values(null,'".$nama."','".$nohp."');";
      //echo $sql;
      $koneksi->query($sql);
    }

  ?>
<body>
    
    <h1>Techstore</h1>
    <div class="login">
        <h2>Daftar</h2>
    <form action="proses_daftar.php" enctype="multipart/form-data" method="post">
        <div class="input">
            <p>Nama</p>
            <input type="text" name="nama" id="nama" placeholder="Masukin Nama anda disini" required> 
            <input type="text" name="akl" id="akl" value="2" hidden>
            <input type="text" name="status" id="status" value="user" hidden>
            <p>No Handphone</p>
            <input type="text" name="nohp" id="nohp" placeholder="Masukin No HP anda disini" required>
            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Masukan Kata Sandi anda disini" pattern="{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.password_konfirmasi.pattern = this.value;" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i>
            <p>Konfirmasi Password</p>
            <input type="password" name="password_konfirmasi" id="password_konfirmasi" pattern="{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Password Tidak Sama !' : '');" placeholder="Masukan Ulang Kata Sandi anda disini" required>
            <i class="bi bi-eye-slash" id="togglePassword2"></i>
        </div>
        <div class="submit">
            <input type="submit" value="Daftar" ></a>
        </div>
    </form>
        <div class="daftar">
            <p>Sudah punya akun ? <a href="login.php">Login</a></p>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const togglePassword2 = document.querySelector("#togglePassword2");
        const password = document.querySelector("#password");
        const password_konfirmasi = document.querySelector("#password_konfirmasi");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type = password_konfirmasi.getAttribute("type") === "password" ? "text" : "password";
            password_konfirmasi.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function (e) {
        //     e.preventDefault();
        // });
    </script>

</body>
</html>