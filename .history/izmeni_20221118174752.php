<?php
require "konekcija.php";
include "models/film.php";

if(isset($_POST['azuriraj'])){
    $film = trim($_POST['film']);
    $ocena = trim($_POST['ocena']);

    if(Film::azuriraj($film, $ocena, $konekcija)){
        echo '<script type="text/javascript">
        window.onload = function () { alert("Film je uspešno ažuriran!"); } 
        </script>'; 
    } else {
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
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
                <form method="post" action="" id="forma" style="margin-top: 50px">
                    <label for="film">Odaberite film</label>
                    <select id="film" name="film" class="form-control"></select>

                    <label for="ocena">Ocena</label>
                    <select id="ocena" name="ocena" class="form-control">
                        <option value="10">10</option>
                        <option value="8">9</option>
                        <option value="8">8</option>
                        <option value="7">7</option>
                        <option value="6">6</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>

                    <br>
                    <button class="BtnForm" type="submit" name="azuriraj">Ažuriraj film</button>

                </form>
            </div>

        </div>
    </div> 
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function popuniFilmoveIzmena() {
            let tip = "izmeni";
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
        popuniFilmoveIzmena();

    </script>
</body>

</html>