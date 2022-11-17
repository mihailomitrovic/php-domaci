<?php
require "konekcija.php";
require "models/film.php";

$tip = trim($_GET['tip']);

if($tip=="izmeni"){
    $filmovi = Film::vratiFilmove("2", "asc", $konekcija);
}else{
    $filmovi = Film::vratiFilmove("0", "asc", $konekcija);      
}

foreach ($filmovi as $film){
    ?>
    <option value="<?= $film->filmID ?>"><?= $film->naziv ?> </option>
    <?php
}
?>