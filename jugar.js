document.addEventListener('DOMContentLoaded', function () {
    
   
let labels = document.getElementsByClassName("answer");
let label_seleccionado = null;


for(let label of labels){
    label.addEventListener('click', ()=>{

        // verifica si ya se ha pulsado algun label anteriormente
        if (label_seleccionado) {
            label_seleccionado.classList.remove('input_selected');
        }

        label.classList.add('input_selected');

        // actualizar el label pulsado
        label_seleccionado = label;
    });
}




});