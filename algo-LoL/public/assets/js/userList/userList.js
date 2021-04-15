const userList = {

    init: function(){
        console.log("initialisation");

        const btnTop = document.querySelector(".top");
        btnTop.addEventListener('click', userList.handleClickTop);
    },

    handleClickTop: function(){
        const btnTop = document.querySelector(".top");
        btnTop.style.background = "#00e6ff";

        const topRole = document.querySelectorAll("#Toplaner");
        const jungleRole = document.querySelectorAll("#Jungler");
        const midRole = document.querySelectorAll("#Midlaner");
        const botRole = document.querySelectorAll("#ADC");
        const supportRole = document.querySelectorAll("#Support");
        const allRole = document.querySelectorAll(".item-user"); 

        /* otherRole =[
            jungleRole,midRole,botRole,supportRole
        ] */
        let index = 0;
        for (index in allRole){
            if (botRole || jungleRole || midRole || supportRole){
                botRole[index].style.display = "none";
                jungleRole[index].style.display = "none";
                midRole[index].style.display = "none";
                supportRole[index].style.display = "none";
            }
            index++;

        }
/*         for (index in midRole){
            midRole[index].style.display = "none";
        }  
        for (index in botRole){
            botRole[index].style.display = "none";
        }  
        for (index in supportRole){
            supportRole[index].style.display = "none";
        }  
 */
        for (index in topRole){
            topRole[index].style.display = "flex";
        }  

    }


}
document.addEventListener('DOMContentLoaded', userList.init);