const btnAgregarConcierto = document.querySelectorAll('.bi').forEach((boton) => {
    boton.addEventListener('click', () => {
        const concierto = boton.getAttribute('concierto-id');

        // Obtener los elementos existentes del localStorage (si los hay)
        let conciertosGuardados = JSON.parse(localStorage.getItem('mis-conciertos')) || [];

        if(!conciertosGuardados.includes(concierto)) {
            conciertosGuardados.push(concierto);
        }

        // Guardar el array actualizado en el localStorage
        localStorage.setItem('mis-conciertos', JSON.stringify(conciertosGuardados));
    })
});
