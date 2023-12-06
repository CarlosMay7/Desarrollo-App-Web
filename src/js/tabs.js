(function(){

    const descripcionBtn = document.querySelector("#descripcion-btn");
    descripcionBtn.addEventListener('click', function(evt) {
        abrirInfo(evt, "Descripcion");
    });
    
    const conciertosBtn = document.querySelector("#conciertos-btn");
    conciertosBtn.addEventListener('click', function(evt) {
        abrirInfo(evt, "Conciertos");
    });
    
    function abrirInfo(evt, asunto) {
        var i, tabcontent, tablinks;
    
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        
        document.getElementById(asunto).style.display = "block";
        evt.currentTarget.classList.add("active");
    }
    document.querySelector(".defaultOpen").click();
})()
