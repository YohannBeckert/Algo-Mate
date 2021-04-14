const edit = {

    init: function(){
        console.log("initialisation de l'édition");
        btnAddAvai = document.querySelector("#add-av");
        modal = document.querySelector("#popup");
    },

    handleClickBtnAddAvai: function(){
        modal.style.display = "block";
    },
    
    handleClickBtnClose: function(){
        modal.style.display = "none";
    }


}
document.addEventListener('DOMContentLoaded', edit.init);