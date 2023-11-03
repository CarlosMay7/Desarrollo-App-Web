<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Concierto</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Concierto</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="nombre" 
            name="nombre" 
            placeholder="Nombre del Concierto" 
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
        ></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoaria" class="formulario__label">Género del Concierto</label>
        <select class="formulario__select" id="categoria" name="categoria_id">
            <option value="">--Seleccionar--</option>
            <option value="1">Trap</option>
            <option value="1">R&B</option>
            <option value="1">Pop</option>
            <option value="1">Reguetón</option>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Seleccione el Día</label>

        <div class="formulario__radio">

            <div>
                <label for="martes">Martes</label>
                <input 
                    type="radio" 
                    id="martes"
                    name="dia"
                    value="martes"
                />
            </div>
            <input type="hidden" name="dia_id" value="">

            <div>
                <label for="miercoles">Miércoles</label>
                <input 
                    type="radio" 
                    id="miercoles"
                    name="dia"
                    value="miercoles"
                />
            </div>
            <input type="hidden" name="dia_id" value="">
        </div>


    </div>

    <div class="formulario__campo" id="horas">
        <label for="" clas="formulario__label">Seleccionar Hora</label>

        <ul id="horas" class="horas">
            <li class="horas__hora horas__hora--deshabilitada" data-hora-id = "18:00">
                18:00
            </li>
            <li class="horas__hora horas__hora--deshabilitada" data-hora-id = "20:00">
                20:00
            </li>
            <li class="horas__hora" data-hora-id = "19:00">
                19:00
            </li>
            <li class="horas__hora" data-hora-id = "21:00">
                21:00
            </li>
        </ul>

        <input type="hidden" name="hora_id" value="">

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
        <input type="hidden" name="artista_id" value="1">

    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input 
            type="number"
            min= "1" 
            class="formulario__input" 
            id="disponibles" 
            name="disponibles" 
            placeholder="Ej: 20" 
            value= ""
        >
    </div>
</fieldset>