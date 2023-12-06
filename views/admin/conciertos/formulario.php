<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Concierto</legend>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="ciudad" 
            name="ciudad" 
            placeholder="Ciudad del Concierto" 
            value="<?php echo $concierto->ciudad ?? "";?>" 
        >
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Recinto</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="recinto" 
            name="recinto" 
            placeholder="Recinto del Concierto" 
            value="<?php echo $concierto->recinto ?? "";?>" 
        >
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Día</label>
        <input 
            type="number" 
            class="formulario__input" 
            id="dia" 
            name="dia" 
            placeholder="Día del Concierto" 
            value="<?php echo $concierto->dia ?? "";?>" 
        >
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Mes</label>
        <input 
            type="number" 
            class="formulario__input" 
            id="mes" 
            name="mes" 
            placeholder="Mes del Concierto" 
            value="<?php echo $concierto->mes ?? "";?>" 
        >
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Año</label>
        <input 
            type="number" 
            class="formulario__input" 
            id="año" 
            name="año" 
            min="2023"
            placeholder="Año del Concierto" 
            value="<?php echo $concierto->año ?? "";?>" 
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input" 
            id="descripcion" 
            name="descripcion" 
            placeholder="Descripción del Concierto" 
            rows = "8" 
        ><?php echo $concierto->descripcion ?? "";?></textarea>
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="artistas" class="formulario__label">Artista / Banda</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="artistas" 
            placeholder="Buscar Artista / Banda" 
        >
        <ul id="listado-artistas" class="listado-artistas"></ul>
        <input type="hidden" name="artista_id" value="<?php echo $concierto->artista_id; ?>">

    </div>

    <div class="formulario__campo">
        <label for="url" class="formulario__label">URL de compra</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="url" 
            name="url_compra" 
            placeholder="URL de compra" 
            value="<?php echo $concierto->url_compra ?? "";?>" 
        >
    </div>
</fieldset>