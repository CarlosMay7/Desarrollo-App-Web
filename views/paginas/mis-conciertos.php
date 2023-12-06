<main class="mis-conciertos">
    <h2 class="mis-conciertos__heading"><?php echo $titulo; ?></h2>
    <p class="mis-conciertos__descripcion">No Te Pierdas Ningún Concierto</p>
   
<?php if($conciertos ==NULL){ ?>
    <div class="mis-conciertos__contenedor">
        <h2>¡Ups! Parece que no tienes conciertos guardados</h2>

        <a class="mis-conciertos__enlace" href="/conciertos">Ve los conciertos disponibles aquí</a>
    </div>
    
<?php } else { ?>
    <div>
    <h2 class="conciertos__heading">Conciertos</h2>
        <p class="conciertos__fecha">2023</p>
        <?php 
            for ($i=11; $i<13; $i++){
            ?>
        <div class="conciertos__listado slider swiper">
            <div class="swiper-wrapper">
            <?php
            foreach($conciertos[$i] as $concierto){
                ?>
            
                <div class="concierto swiper-slide">
                    <p class="concierto__fecha"><?php echo $concierto->dia . " " . $concierto->mes?> </p>
                    <a href="/lista-conciertos?concierto=<?php echo $concierto->id?>">
                        <div class="concierto__card">
                            <img class="concierto__imagen-artista" loading="lazy" width="200" height="300" src= "<?php echo $concierto->imagen?>" alt="Artista">
                           
                            <div class="concierto__informacion">
                                <h4 class="concierto__nombre"><?php echo $concierto->recinto ?></h4>
                                <p class="concierto__ciudad"><?php echo $concierto->ciudad?></p>
                                <p class="concierto__introduccion">  </p>
                                <p class="concierto__artista-nombre"><?php echo $concierto->nombre ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php  } ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <?php } ?>
   
    </div>
<?php } ?>

</main>