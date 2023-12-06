const btnMisConciertos = document.querySelector('#mis-conciertos');
btnMisConciertos.addEventListener('click', ()=>{
    const conciertos = localStorage.getItem("mis-conciertos");

    function setCookie(nombre, valor, diasExpiracion) {
        let fechaExpiracion = new Date();
        fechaExpiracion.setTime(fechaExpiracion.getTime() + (diasExpiracion * 24 * 60 * 60 * 1000));
        let expires = "expires=" + fechaExpiracion.toUTCString();
        document.cookie = nombre + "=" + valor + ";" + expires + ";path=/";

        localStorage.clear()
    }

    setCookie("mis-conciertos", conciertos, 1);

});