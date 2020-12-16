<?php include "header.php";
require "../controllers/add_controller.php";

if(isset($_GET['form'])) {

    if ($_GET['form'] == 'formErreurEmpty') {
        echo "<p style= 'color: red'>Veuillez renseigner les champs nécessaires</p>";
    } elseif ($_GET['form'] == 'formErreurRegExp') {
        echo "<p style= 'color: red'>Veuillez respecter le format des champs correspondants.</p>";
    }
}
?>
    <h2 class="mb-5">Ajouter un Album</h2>

    <div class="box">

    <form action ="../controllers/add_script.php" method ="POST" enctype="multipart/form-data">


        <div class="row inline d-flex justify-content-center mt-5">
            <div class="col-5">

                <img  src="../assets/img/CD.jpg" class ="img-fluid float-center update mt-5 mb-5">

                <div class="custom-file">

                    <label class="custom-file-label" for="upload">Charger une nouvelle image: </label>
                    <input type="file" onchange= "handleFiles(files)" class="custom-file-input mb-3" multiple name="upload" id="upload">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                    <span id="preview"></span>


                </div>
            </div>
            <div class="col-5">

                <label for="title">Titre : </label><span id="erreurTitle"></span>
                <input class= "form-control mb-2" type="text" name="title" id="title" >


                <label for="artist">Artiste(s) : </label>
                <select class="form-control mb-2" name ="artist">
                    <?php
                    foreach ($artist as $artist){
                        echo"<option value=".$artist["artist_id"].">".$artist["artist_name"]."</option>";
                    }
                    ?>
                </select>


                <label for="label">Label : </label><span id="erreurLabel"></span>
                <input class= "form-control mb-2" type="text" name="label" id="label"  >

                <label for="date">Année : </label><span id="erreurDate"></span>
                <input class= "form-control mb-2" type="text" name="date" id="date" >

                <label for="type">Genre : </label><span id="erreurType"></span>
                <input class= "form-control mb-2" type="text" name="type" id="type" >

                <label for="price">Prix : </label><span id="erreurPrice"></span>
                <input class= "form-control mb-2" type="text" name="price" id="price" >


                <input type="submit" class="btn btn-success my-3" id="ajout" value="Ajouter">
                <input type="reset" class="btn btn-danger" value="Annuler">
                <a href ="../index.php"><button type="button" class="btn btn-info">Retour</button></a>
            </div>
        </div>

    </form>


<?php include "footer.php";?>