<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/artistas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Artista
    </a>
</div>

<div class="dashboard__contenedor">

    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">Nombre</th>
                <th scope="col" class="table__th">Ubicación</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            <?php for($i=0; $i<8; $i++){ ?>
                <tr class="table__tr">
                    <td class="table__td">
                        Benito Martinez
                    </td>

                    <td class="table__td">
                        Puerto Rico
                    </td>

                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/admin/artistas/editar?id=#">
                        <i class="fa-solid fa-user-pen"></i>
                        Editar
                        </a>

                        <form method="POST" action="/admin/artistas/eliminar" class="table__formulario">
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