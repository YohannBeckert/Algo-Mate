const app = {
    // On crée des propriétés à notre objet app. Ce sont des variables qui sont utilisables dans l'entièreté de l'objet app, donc dans init comme dans d'autres fonctions.
    fieldUsername: null,
    fieldPassword: null,

    init: function(){
        // On sélectionne notre champ username et on le stocke dans la propriété fieldUsername.
        app.fieldUsername = document.querySelector('#inputEmail');
        app.fieldPassword = document.querySelector('#inputPassword');
        
        // Ici on sélectionne notre formulaire
        const form = document.querySelector('#login-form');
    
        // On place un écouteur d'événement sur le champ. Quand celui-ci détecte un "blur" (perte de focus), il exécute la méthode "app.handleBlur".
        app.fieldUsername.addEventListener('blur', app.handleBlur);
        app.fieldPassword.addEventListener('blur', app.handleBlur);

    },
    
    handleBlur: function(event){
        
        // event.target contient l'élément qui a déclenché un événement. Donc il contiendra le champ username ou password selon le champ dans lequel on a écrit.
        // On récupère le champ qui a déclenché l'évenement.
        let currentField = event.target;
        let fieldValue = currentField.value;
        let isValidField = app.checkValidField(fieldValue);

        // On vérifie la longueur de la valeur du champ
        if(isValidField) {
            // Notre champ est valide, on retire une potentielle classe "invalid" et  on lui ajoute la classe "valid"
            currentField.classList.remove('invalid');
            currentField.classList.add('valid');

        } else {
            // Notre champ n'est pas valide, on retire une potentielle classe "valid" et  on lui ajoute la classe "invalid"
            currentField.classList.remove('valid');
            currentField.classList.add('invalid');
        }

    },

    // Petite fonction utilitaire permettant de retourner "true" si la valeur passée est supérieure ou égale à 6, et "false" sinon. 
    checkValidField: function(fieldValue){
        if(fieldValue.length >= 6) {
            return true;
        } else {
            return false;
        }
    },

}
document.addEventListener('DOMContentLoaded', app.init);


