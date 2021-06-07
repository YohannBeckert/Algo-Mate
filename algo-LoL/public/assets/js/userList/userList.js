const userList = {

    

    init: function(){
       
        const btnTop = document.querySelector(".top");
        btnTop.addEventListener('click', userList.handleClickTop);
        const btnJungle = document.querySelector(".jungle");
        btnJungle.addEventListener('click', userList.handleClickJungle);
        const btnMid = document.querySelector(".mid");
        btnMid.addEventListener('click', userList.handleClickMid);
        const btnBot = document.querySelector(".bot");
        btnBot.addEventListener('click', userList.handleClickBot);
        const btnSupport = document.querySelector(".support");
        btnSupport.addEventListener('click', userList.handleClickSupport);
        const btnAll = document.querySelector(".all");
        btnAll.addEventListener('click', userList.handleClickAll);


    },

    handleClickAll: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");

        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;
        
        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

    },

    handleClickTop: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");

        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;
        
        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

        allRole.forEach(element => {
            if(element.id !== "Toplaner"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickJungle: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");
        
        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;
        
        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

        allRole.forEach(element => {
            if(element.id !== "Jungler"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickMid: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");

        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;

        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

        allRole.forEach(element => {
            if(element.id !== "Midlaner"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickBot: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");

        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;

        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

        allRole.forEach(element => {
            if(element.id !== "ADC"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickSupport: function(event){
        userList.reset();

        const allRole = document.querySelectorAll(".item-user");

        let btnToCheck = event.currentTarget;
        let btnValue = btnToCheck.value;

        userList.colorizeBtn(btnToCheck, userList.btnValueIsValid(btnValue));

        allRole.forEach(element => {
            if(element.id !== "Support"){
                element.classList.add("display-none");
            }
        });
    },

    reset: function (){
        const allRole = document.querySelectorAll(".item-user");

        const btnAll = document.querySelector(".all");
        const btnTop = document.querySelector(".top");
        const btnJungle = document.querySelector(".jungle");
        const btnMid = document.querySelector(".mid");
        const btnBot = document.querySelector(".bot");
        const btnSupport = document.querySelector(".support");

        let arrayBtn = [btnTop, btnJungle, btnMid, btnBot,btnSupport,btnAll];

        arrayBtn.forEach(element => {
            element.classList.remove("btn-clicked");
        });
        allRole.forEach(element => {
            element.classList.remove("display-none");
        });
    },

    btnValueIsValid: function (valueToCheck) {
        if (valueToCheck ) {
          return true;
        } else {
          return false;
        }
    },

    colorizeBtn: function (btnToColorize, btnIsValid) {
        btnToColorize.classList.remove("btn-clicked");
        btnToColorize.classList.remove("btn-clicked");

        if (btnIsValid) {
          btnToColorize.classList.add("btn-clicked");
        } else {
          btnToColorize.classList.add("btn-clicked");
        }
      },

}
document.addEventListener('DOMContentLoaded', userList.init);