const userList = {

    init: function(){
        console.log("initialisation");
       
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

    handleClickTop: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnTop = document.querySelector(".top");
        btnTop.style.background = "#00e6ff";       

        allRole.forEach(element => {
            if(element.id !== "Toplaner"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickJungle: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnJungle = document.querySelector(".jungle");
        btnJungle.style.background = "#00e6ff";       

        allRole.forEach(element => {
            if(element.id !== "Jungler"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickMid: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnMid = document.querySelector(".mid");
        btnMid.style.background = "#00e6ff";       

        allRole.forEach(element => {
            if(element.id !== "Midlaner"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickBot: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnBot = document.querySelector(".bot");
        btnBot.style.background = "#00e6ff";       

        allRole.forEach(element => {
            if(element.id !== "ADC"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickSupport: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnSupport = document.querySelector(".support");
        btnSupport.style.background = "#00e6ff";       

        allRole.forEach(element => {
            if(element.id !== "Support"){
                element.classList.add("display-none");
            }
        });
    },

    handleClickAll: function(){
        const allRole = document.querySelectorAll(".item-user");
        const btnAll = document.querySelector(".all");
        btnAll.style.background = "#00e6ff";       

       /*  allRole.forEach(element => {
            if(element.id !== "Alllan"){
                element.classList.add("display-none");
            }
        }); */
    },
}
document.addEventListener('DOMContentLoaded', userList.init);