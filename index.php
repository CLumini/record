<?php
require "controllers/index_controller.php";
include "views/header.php";

if(isset($_GET['form'])) {

    if ($_GET['form'] == 'formOk') {
        echo "<p style= 'color: red;'>Formulaire envoyé avec succès !</p>";
    }
}
    ?>
<div class="box">

<h2 class="d-flex justify-content-center mb-5">Catalogue</h2>


    <a href = "views/form_add.php"><img class="img-fluid add float-right mb-5" hover="Ajouter un album" src="https://img.icons8.com/color/80/000000/add-song.png"/></a>
    <div class="row inline col-12 ">

    <?php
    foreach ($disc as $disc){
        $disc_id= $disc["disc_id"];
        $title = $disc["disc_title"];
        $artist= $disc["artist_name"];
        $picture= $disc["disc_picture"];
        $date= $disc["disc_year"];
        $label= $disc["disc_label"];
        $type= $disc["disc_genre"];
    ?>

<div class="col-3">
    <a href ="views/detail.php?disc_id=<?=$disc_id?>" ><img src="assets/img/<?=$picture?>" class ='img-fluid imgDetail listImg my-3'></a>
</div>
        <div class="col-3 mb-4 "
       <p>Titre: <?=$title?></p>
       <p>Artiste(s): <?=$artist?></p>
       <p>Label: <?=$label?></p>
       <p>Genre: <?=$type?></p>
       <p>Année: <?=$date?></p>

        <a href ="views/form_update.php?disc_id=<?=$disc_id?>" ><button type="button" class = "btn btn-success mb-5">Modifier</button>
        <a href ="controllers/delete_script.php?disc_id=<?=$disc_id?>" onclick= "supprimer()"><button type="button" class = "btn btn-danger mb-5">Supprimer</button></a>
        </div>

    <?php
    }
    ?>
</div>


    <nav>
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
                <li class="page-item  <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
    </div>
<?php
include "views/footer.php";