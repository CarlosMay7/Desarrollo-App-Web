<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__formulario">
<?php require_once __DIR__ . "/../../templates/alertas.php"; ?>

    <form method="POST" class="formulario">
        <?php
            include_once __DIR__ . "/formulario.php";
        ?>

        <div class="formulario__campo">
            <label for="categoria" class="formulario__label">Sold Out</label>

            <div class="formulario__radio">

                <div>
                    <label for="sold-out">Si</label>
                    <input 
                        type="radio" 
                        name="sold_out"
                        value="1"
                        <?php echo ($concierto->sold_out == 1) ? "checked" : ""; ?>
                    />
                </div>

                <div>
                    <label for="miercoles">No</label>
                    <input 
                        type="radio" 
                        name="sold_out"
                        value="0"
                        <?php echo ($concierto->sold_out == 0) ? "checked" : ""; ?>
                    />
                </div>
            </div>
        </div>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Cambios">
    </form>
</div>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/conciertos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>