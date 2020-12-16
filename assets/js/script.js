

<!-- Fonction aperçu avant upload -->

function handleFiles(files) {
    let imageType = /^image\//;

    for (let i = 0; i < files.length; i++) {

        let file = files[i];

        if (!imageType.test(file.type)) {
            alert("veuillez sélectionner une image");
        }else{
            if(i == 0){
                preview.innerHTML = '';
            }

            let img = document.createElement("img");

            img.classList.add("obj");
            img.file = file;
            preview.appendChild(img);

            let reader = new FileReader();

            reader.onload = ( function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);

            reader.readAsDataURL(file);
        }

    }
};



<!-- Fonction qui se déclenche quand on appuie sur "Modifier"/ "Supprimer -->

    function modif(event)
    {
        let resultat = confirm("Êtes-vous sûr de vouloir modifier cet album ?");
        if(resultat== false)
    {
        event.preventDefault();
    }
    }



    function supprimer(event)
    {
        let resultat = confirm("Êtes-vous sûr de vouloir supprimer cet album ?");
        if (resultat == false)
    {
        event.preventDefault();
    }
    }

