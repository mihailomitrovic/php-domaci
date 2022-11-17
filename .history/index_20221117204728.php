<?php

$username="";

session_start();
if (!isset($_SESSION['korisnik'])) {
    header('Location: login.php');
    exit();
}

if (isset($_COOKIE["korisnik"])) {
    $username=$_COOKIE["korisnik"];
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodavanje filma</a>
                <a href="izmeni.php" class="nav-item nav-link">Unos ocene</a>
                <a href="obrisi.php" class="nav-item nav-link">Brisanje filma</a>
            </div>
        </div>  
        <label class="nav-item nav-link" style="color: white !important;"><?= $username;?></label>
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <div class="col" style= "margin-left: -100px; margin-top:100px">
                    <center>
                    <label for="status">Status</label>
                    <select class="form-control" id="status">
                        <option value="0">Svi</option>
                        <option value="1">Odgledano</option>
                        <option value="2">Nije odgledano</option>
                    </select>
                    <br>
                    <label for="sortiranje">Sortiranje</label>
                    <select class="form-control" id="sortiranje">
                        <option value="asc">Rastuće</option>
                        <option value="desc">Opadajuće</option>
                    </select>
                    <br><br>
                    <button class="BtnFormP" onclick="pretrazi()">Primeni</button>
                    </center>
                </div>
                <br><br>
                <div class="col" id="filmovi" ></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>
        function pocetnaPretraga() {
            let status = "0";
            let sortiranje = "asc";
            $.ajax({
                url: 'pretraziFilmove.php',
                data: {
                    status: status,
                    sortiranje: sortiranje
                },
                success: function (data) {
                    $("#filmovi").html(data);
                }
            });
        }
        pocetnaPretraga();
    
        function pretrazi() {
            let status = $("#status").val();
            let sortiranje = $("#sortiranje").val();
            $.ajax({
                url: 'pretraziFilmove.php',
                data: {
                    status: status,
                    sortiranje: sortiranje
                },
                success: function (data) {
                    $("#filmovi").html(data);
                }
            });
        }
    </script>

</body>

</html>