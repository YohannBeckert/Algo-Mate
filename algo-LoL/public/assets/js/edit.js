const edit = {

    init: function(){
        console.log("initialisation de l'édition");       

    },

    handleClick: function(){
        let resultDay = document.querySelector('.result-day');
        resultDay.value = document.querySelector('.result-day p');
        let oldValue = resultDay.value;
        console.log(oldValue);
        document.querySelector("#edit_monday").classList.add("display-none");
    }


}
document.addEventListener('DOMContentLoaded', edit.init);