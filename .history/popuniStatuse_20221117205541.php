<?php
require "konekcija.php";
require "models/status.php";

$statusi = Status::vratiStatuse($konekcija);

foreach ($statusi as $status) {

    ?>
    <option value="<?= $status->statusID ?>"><?= $status->status ?> </option>
    <?php
}
?>