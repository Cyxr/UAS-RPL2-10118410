<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="icon" href="Group 2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Techstore</title>
</head>
<body>
    <h1>Techstore</h1>
    <form action ="ceklogin.php" method="post">
    <div class="login">
        <h2>Login</h2>
        <?php if(isset($_GET['pesan'])) : ?>
            <div class="alert alert-danger" role="alert">
                 Username atau password yang anda masukan salah!
            </div>
        <?php endif; ?>
        <div class="input">
            <p>No Handphone</p>
            <input type="text" name="nohp" placeholder="Masukin No HP disini">
            <p>Password</p>
            <input type="password" name="password" placeholder="Masukin No HP disini">
        </div>
        <div class="submit">
            <a href="indexlogin.php"><input type="submit" value="Login"></a>
        </div>
        
    </form>
        <div class="daftar">
            <p>Belum punya akun ? <a href="daftar.php">Daftar</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>