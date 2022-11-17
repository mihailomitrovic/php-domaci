<?php
require "konekcija.php";
require "models/film.php";

$status = trim($_GET['status']);
$sortiranje = trim($_GET['sortiranje']);

$filmovi = Film::vratiFilmove($status, $sortiranje, $konekcija);

?>

<table class="table">
    <thead>
        <tr style="background-color: rgb(68, 68, 68)">
            <th style="width: 30%">Naziv</th>
            <th style="width: 25%">Zanr</th>
            <th style="width: 30%">Status</th>
            <th style="width: 15%">Ocena</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($filmovi as $film){
    ?>
    <tr>
        <td><?= $film->naziv?></td>
        <td><?= $film->zanr?></td>
        <td><?= $film->status?></td>
        <?php
        if($film->ocena=="0"){
            ?>
            <td>/</td>
            <?php
        }else{
            ?>
            <td><?= $film->ocena?></td>  
            <?php
        }
        ?>
    </tr>
<?php
}
?>
    </tbody>
</table>

