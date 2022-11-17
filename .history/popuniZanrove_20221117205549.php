<?php
require "konekcija.php";
require "models/zanr.php";

$zanrovi = Zanr::vratiZanrove($konekcija);

foreach ($zanrovi as $zanr) {
    ?>
    <option value="<?= $zanr->zanrID ?>"><?= $zanr->zanr ?> </option>
    <?php
}
?>