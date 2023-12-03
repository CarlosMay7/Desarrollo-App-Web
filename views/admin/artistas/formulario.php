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
            value="<?php echo $artista->nombre ?? "";?>"
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

    <?php if(isset($artista->imagenActual)){ ?>

        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <img loading="lazy" src="<?php echo $_ENV["HOST"] . "/img/artistas/" . $artista->imagen; ?>.jpg" alt="imagen Artista">
        </div>
    <?php } ?>

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
        <input type="hidden" name="etiquetas" value="<?php echo $artista->etiquetas ?? ""; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
<legend class="formulario__legend">Información Extra</legend>

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
                value="<?php echo $artista->redes['instagram'] ?? ""; ?>"
            >
        </div>
    </div>
    
    
</fieldset>