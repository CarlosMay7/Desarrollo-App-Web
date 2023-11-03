<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/conciertos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Concierto
    </a>
</div>

<div class="dashboard__contenedor">

    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Concierto</th>
                <th scope="col" class="table__th">Categoría</th>
                <th scope="col" class="table__th">Día y Hora</th>
                <th scope="col" class="table__th">Artista / Banda</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            <?php for($i=0; $i<8; $i++){ ?>
                <tr class="table__tr">
                    <td class="table__td">
                        Nadie Sabe Lo Que Va a Pasar Mañana
                    </td>
                    <td class="table__td">
                        Trap
                    </td>
                    <td class="table__td">
                        Martes, 15:00
                    </td>
                    <td class="table__td">
                        Bad Bunny
                    </td>

                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/admin/conciertos/editar?id=#">
                        <i class="fa-solid fa-pencil"></i>
                        Editar
                        </a>

                        <form method="POST" action="/admin/Conciertos/eliminar" class="table__formulario">
                            <input type="hidden" name="id" value="#">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-solid fa-circle-xmark"></i>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>