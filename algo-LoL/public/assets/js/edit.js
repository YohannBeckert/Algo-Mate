const edit = {

    init: function(){

        const monday = document.querySelector("#monday");
        monday.addEventListener('click',edit.changeValueMonday);
        const inputSelected = document.querySelector("#monday-id");
        inputSelected.addEventListener('click',edit.handleInpute);       

    },

    changeValueMonday: function(event){
        event.preventDefault();

        const mondayBtn = document.querySelector("#btn-monday");
        mondayBtnValue = mondayBtn.value;
        
        mondayBtn.classList.add("display-none");

        let input = document.createElement('input');
        input.type = "text";
        input.value = mondayBtnValue;
        input.id = "monday-id";
        let mondayDiv = document.querySelector("#monday");
        mondayDiv.appendChild(input);
    },

    handleInpute: function(event){
        event.preventDefault();
    }

}
document.addEventListener('DOMContentLoaded', edit.init);