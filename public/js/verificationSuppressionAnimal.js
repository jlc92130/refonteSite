var btnSup = document.querySelector("#btnSup");

btnSup.addEventListener("click", function() {
    
    event.preventDefault();
    var idAnimal = document.querySelector('#animal').value;
    var nomAnimal = document.querySelector('#nom').value;
    if(confirm('Voulez-vous supprimer l\'animal '+ nomAnimal + '?')) {
        document.location.href = "genererPensionnaireAdminSup&sup="+idAnimal;
    }
});