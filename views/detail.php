<?php
include "header.php";
require "../controllers/detail_controller.php";
?>
<h2 class="mb-5"><?=$title?></h2>
    <div class="box">

<div class="row inline d-flex justify-content-center mt-5">
<div class="col-5 float-center my-5 ">
    <img src="/assets/img/<?=$picture?>" class ='img-fluid detail'>
</div>
    <div class="col-5 float-center mt-5">

        <h3><?= $artist ?></h3>
        <p>Label: <?= $label ?></p>
        <p>Année: <?=$date ?></p>
        <p>Genre: <?=$type ?></p>
        <p>Prix: <?=$price ?> €</p>
            <a href ="../index.php"><button class = "btn btn-success my-3">Retour</button>
    </div>

</div>
    </div>

<?php

include "footer.php";