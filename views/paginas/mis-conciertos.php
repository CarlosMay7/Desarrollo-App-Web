<main class="mis-conciertos">
    <h2 class="mis-conciertos__heading"><?php echo $titulo; ?></h2>
    <p class="mis-conciertos__descripcion">No Te Pierdas Ningún Concierto</p>
   
<?php if ($misConciertos == NULL){ ?>
    <div class="mis-conciertos__contenedor">
        <h2>¡Ups! Parece que no tienes conciertos guardados</h2>

        <a class="mis-conciertos__enlace" href="/conciertos">Ve los conciertos disponibles aquí</a>
    </div>
    
<?php } else { ?>
    <form class="mis-conciertos__listado" method="POST">
            <?php foreach($misConciertos as $concierto){ ?>

                <div class="mis-conciertos__concierto">
                    <label class="mins-conciertos__concierto-nombre"><?php echo $concierto->nombre?> - <?php echo $concierto->dia?>/<?php echo $concierto->mes?>/<?php echo $concierto->año?></label>
                    <input name="conciertos[]" type="checkbox" class ="mis-conciertos__check" value="<?= $concierto->id; ?>" checked>
                </div>
        
                <?php } ?>
        </form>
    <button id="boton-enviar" class="mis-conciertos__boton">Agregar Conciertos</button>
<?php } ?>

</main>