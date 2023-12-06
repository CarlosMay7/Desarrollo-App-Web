
document.addEventListener("DOMContentLoaded", function(){
let botones = document.getElementsByClassName("listaconciertos__agregar");
function agregarConcierto(){
    //sacar id del url
    id = location.href.split("=")[1]
    
    conciertos = localStorage.getItem("conciertos");
    if(conciertos != null){
        conciertos = JSON.parse(conciertos);
    } else {
        conciertos = [];
    }
    if(conciertos.includes(id)){
        return;
    }else{
        conciertos.push(id);
    }
    
    localStorage.setItem("conciertos", JSON.stringify(conciertos));
}

for (let boton of botones){
boton.addEventListener("click", agregarConcierto);
}
});