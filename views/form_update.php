<?php include "header.php";
require "../controllers/update_controller.php";

$disc_id = $_GET["disc_id"];

?>
    <h2 class="mb-5"><?=$title?></h2>
    <div class="box">

        <form action ="../controllers/update_script.php" method ="POST" enctype="multipart/form-data">

            <div class="row inline d-flex justify-content-center mt-5">

                    <div class="col-5">

                <img  src="/assets/img/<?=$picture?>" class ="img-fluid float-center update mt-5 mb-5">

                        <div class="custom-file">

                            <label class="custom-file-label" for="upload">Charger une nouvelle image: </label>
                            <input type="file" onchange= "handleFiles(files)" class="custom-file-input mb-3" multiple name="upload" id="upload">
                            <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                            <span id="preview"></span>

                        </div>
                    </div>

            <div class="col-5">

                <input hidden type ="text" name="disc_id" value ="<?=$disc_id?>" readonly>
                <input hidden type ="text" name="artist_id" value ="<?=$artist_id?>" readonly>

            <label for="title">Titre : </label>
                <input class= "form-control mb-2" type="text" name="title" value= '<?= $title ?>'>

            <label for="artist">Artiste(s) : </label>
                <select class="form-control mb-2" name ="artist">
                    <?php
                    foreach ($artist as $artist){
                        echo"<option value=".$artist["artist_id"].">".$artist["artist_name"]."</option>";
                    }
                    ?>
                </select>

            <label for="label">Label : </label>
                <input class= "form-control mb-2" type="text" name="label" value= "<?= $label?>" required>

            <label for="date">Année : </label>
                <input class= "form-control mb-2" type="text" name="date" value= "<?= $date ?>"required>

            <label for="type">Genre : </label>
                <input class= "form-control mb-2" type="text" name="type" value= "<?= $type ?>"required>

            <label for="price">Prix : </label>
                <input class= "form-control mb-2" type="text" name="price" value= "<?= $price ?>"required>



                <input type="submit" class="btn btn-success my-3" onclick = "modif();" id="bouton_envoi" value="Modifier"></input>
                <input type="reset" class="btn btn-danger" value="Annuler">
                <a href ="../index.php"><button type="button" class="btn btn-info">Retour</button></a>

            </div>
            </div>

        </form>



<?php include "footer.php";?>