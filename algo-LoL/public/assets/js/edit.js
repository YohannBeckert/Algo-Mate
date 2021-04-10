const edit = {

    init: function(){
        console.log("initialisation de l'édition");       

        let inputEuw = document.querySelector('#user_countryInGame_0');
        console.log(inputEuw.checked);
        let labelEuw = inputEuw.value;

/*         let divCountry = document.querySelector('#user_countryInGame');
        divCountry.innerHTML = '<div>' + inputEuw.type +  '</div>'; */

    },


}
document.addEventListener('DOMContentLoaded', edit.init);