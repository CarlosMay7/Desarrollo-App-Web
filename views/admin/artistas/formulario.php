<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="nombre" 
            name="nombre" 
            placeholder="Nombre del Artista" 
        >
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="apellido" 
            name="apellido" 
            placeholder="Apellido del Artista" 
        >
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="ciudad" 
            name="ciudad" 
            placeholder="Ciudad del Artista" 
        >
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">País</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="pais" 
            name="pais" 
            placeholder="País del Artista" 
        >
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input 
            type="file" 
            class="formulario__input formulario__input--file" 
            id="imagen" 
            name="imagen" 
            placeholder="País del Artista" 
        >
    </div>


        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <img src="https://tse4.mm.bing.net/th?id=OIP.V5Ao2Q9UoNeRjJOHHGhh5gHaEK&pid=Api&P=0&h=180" alt="">
        </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Géneros (Separados por comas)</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="tags_input" 
            placeholder="Ej: Reguetón, Pop, R&B" 
        >

        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="Reguetón, Pop">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
<legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[facebook] " 
                placeholder="Facebook" 
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[twitter] " 
                placeholder="Twitter" 
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[youtube] " 
                placeholder="YouTube" 
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[instagram] " 
                placeholder="Instagram" 
            >
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[tiktok] " 
                placeholder="Tiktok" 
            >
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input 
                type="text" 
                class="formulario__input--sociales" 
                name="redes[github] " 
                placeholder="GitHub" 
            >
        </div>
    </div>
</fieldset>