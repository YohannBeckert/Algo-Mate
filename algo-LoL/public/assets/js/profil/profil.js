const profil = {    

    init: function(){
       
        ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Texte', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Titre 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h3', title: 'Titre 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

        /* const btnWeight = document.querySelector(".weight");
        btnWeight.addEventListener('click', profil.handleClickWeight); */
        

    },


}
document.addEventListener('DOMContentLoaded', profil.init);