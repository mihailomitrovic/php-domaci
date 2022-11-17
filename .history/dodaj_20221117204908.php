<?php
require "konekcija.php";
require "models/film.php";

session_start();
if (!isset($_SESSION['korisnik'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['sacuvaj'])) {
    $naziv = trim($_POST['naziv']);
    $status = trim($_POST['status']);
    $ocena = trim($_POST['ocena']);
    $zanr = trim($_POST['zanr']);

    if (Film::dodaj($naziv, $status, $ocena, $zanr, $konekcija)) {
        echo '<script type="text/javascript">
               window.onload = function () { alert("Film je evidentiran!"); } 
              </script>'; 
    } else{
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-lg-0 px-lg-5">
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
                <form method="post" action="" id="forma">

                    <label for="naziv">Naziv filma</label>
                    <input type="text" id="naziv" name="naziv" class="form-control">

                    <label for="zanr">Žanr</label>
                    <select id="zanr" name="zanr" class="form-control"></select>
                    
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" onchange="blokiraj(this.value)"></select>

                    <label for="ocena" id="ocenaL">Ocena</label>
                    <select id="ocena" name="ocena" class="form-control">
                        <option value="0">/</option>
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
                    <br><br>

                    <button class="BtnForm" type="submit" name="sacuvaj" >Sačuvaj</button>
                    <br>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        
        function blokiraj(status) {

            if (status == "1") {
                $("#ocena").css('display', 'block');
                $("#ocenaL").css('display', 'block');
            }else{
                $("#ocena").css('display','none');
                $("#ocenaL").css('display','none');
            } 
        }
   
        function popuniZanrove() {

            $.ajax({
                url: 'popuniZanrove.php',
                success: function (data) {
                   $("#zanr").html(data);
                }
            });
        }
        popuniZanrove();
        
        function popuniStatuse() {   
            $.ajax({
                url: 'popuniStatuse.php',
                success: function (data) {
                    $("#status").html(data);
                }
            });
        }
        popuniStatuse();

        
    
    </script>
</body>

</html>