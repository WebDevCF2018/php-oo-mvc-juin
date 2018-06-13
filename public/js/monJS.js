
/*
Fonction pour valider une suppression
 */
function Delete(ID){
    if(confirm("Voulez-vous vraiment supprimer")){
        document.location.href = "?delete="+ID;
    }
    return false;
}