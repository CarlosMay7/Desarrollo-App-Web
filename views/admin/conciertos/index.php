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
                <th scope="col" class="table__th">Ciudad</th>
                <th scope="col" class="table__th">Recinto</th>
                <th scope="col" class="table__th">Artista</th>
                <th scope="col" class="table__th">Fecha</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            <?php if(!empty($conciertos)) { ?>
                <?php foreach($conciertos as $concierto){ ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?= $concierto->ciudad; ?>
                        </td>
                        <td class="table__td">
                        <?= $concierto->recinto; ?>
                        </td>
                        <td class="table__td">
                            <?= $concierto->artista; ?>
                        </td>
                        <td class="table__td">
                            <?= $concierto->dia . "/" . $concierto->mes . "/" . $concierto->año; ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/conciertos/editar?id=<?= $concierto->id ?>">
                            <i class="fa-solid fa-pencil"></i>
                            Editar
                            </a>

                            <form method="POST" action="/admin/conciertos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?= $concierto->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr class="table__tr">
                    <td class="table__td">
                        <p class="text-center">No Hay Conciertos Aún</p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php 
    echo $paginacion;
?>