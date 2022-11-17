<?php

require "konekcija.php";
require "models/korisnik.php";

session_start();
if(isset($_POST['korisnickoIme']) && isset($_POST['lozinka'])){
    $korisnickoIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];

    $korisnik = new Korisnik(1, $korisnickoIme, $lozinka);
    $odgovor = Korisnik::login($korisnik, $konekcija);

    if($odgovor->num_rows==1){
        $_SESSION['korisnik'] = $korisnik->korisnikID;
        setcookie("korisnik", $korisnickoIme, time() + 1800);
        header('Location: index.php');
        exit();
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Pogrešno uneti podaci!"); } 
              </script>'; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Arhiva filmova</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <br><br><br><br><br>
    <div class="container-xxl py-5">
        <div class="container">
            <form method="post" action="" id="forma">
                    <label class="korisnickoIme">Korisničko ime</label>
                    <input type="text" name="korisnickoIme" class="form-control"  required>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" class="form-control" required>
                    <br>
                    <button type="submit" class="BtnForm" name="submit">Prijavi se</button>
            </form>
        </div>
    </div>
</body>
</html>