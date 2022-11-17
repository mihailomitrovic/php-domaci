<?php

require "konekcija.php";
require "models/film.php";

session_start();
if (!isset($_SESSION['korisnik'])) {
    header('Location: index.php');
    exit();
}

if(isset($_POST['obrisi'])){
    $film = trim($_POST['film']);

    if(Film::obrisi($film, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Film je obrisan!"); } 
              </script>'; 
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Došlo je do greške!"); } 
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
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5" >
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodavanje filma</a>
                <a href="izmeni.php" class="nav-item nav-link">Unos ocene</a>
                <a href="obrisi.php" class="nav-item nav-link">Brisanje filma</a>
            </div>
        </div>  
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <form method="post" action="" style="margin-top: 25px;" id="forma">

                    <label for="film">Film</label>
                    <select id="film" name="film" class="form-control"></select>
                    <br>
                    
                    <button class="BtnForm" type="submit" name="obrisi">Obriši</button>

                </form>
            </div>
            <br/>

        </div>
    </div>
  

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
    function popuniFilmove() {
        let tip = "obrisi";
            $.ajax({
                url: 'popuniFilmove.php',
                data: {
                    tip: tip
                },
                success: function (data) {
                $("#film").html(data);
                }
            });
        }
    popuniFilmove();
    </script>


</body>

</html>