<main class="mis-conciertos">
    <h2 class="mis-conciertos__heading"><?php echo $titulo; ?></h2>
    <p class="mis-conciertos__descripcion">No Te Pierdas Ningún Concierto</p>
   
<?php if ($misConciertos == NULL){ ?>
    <div class="mis-conciertos__contenedor">
        <h2>¡Ups! Parece que no tienes conciertos guardados</h2>

        <a class="mis-conciertos__enlace" href="/conciertos">Ve los conciertos disponibles aquí</a>
    </div>
    
<?php } else { ?>
  <div class ="mis-conciertos__caja">
        <?php foreach($misConciertos as $concierto){ ?>
        <div class= "mis-conciertos__conteiner">
        <div class ="mis-conciertos__contenido">
            <img class="mis-conciertos__imagen-artista" loading="lazy" width="50" height="100" src= "<?php echo $concierto->imagen?>" alt="Artista">
            <div class="mis-conciertos__info">
            <p class="mis-conciertos__artista"><?php echo $concierto->nombre?></p>
            <p class="mis-conciertos__ciudad"> <?php echo $concierto->ciudad . " - " . $concierto->recinto ?></p>
            
        </div>
        </div>
        <form action="/mis-conciertos" method ="POST">
            <input type="hidden" name="id" value="<?= $concierto->id; ?>">
            <input type="checkbox" class = "mis-conciertos__eliminar" checked="">
        </form>
        </div>
    
            <?php } ?>
        


  </div>

  <div class="mis-conciertos__agregar">
        <form action="/mis-conciertos" method ="POST">
            <input type="submit" value="Agregar Conciertos" class="mis-conciertos__boton">

        </form>
  </div>
<?php } ?>

</main>