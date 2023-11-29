<main class="agenda">
    <h2 class="agenda__heading"><?php echo $titulo; ?></h2>
    <p class="agenda__descripcion">Los mejores conciertos en la palma de tu mano</p>

    <div class="conciertos">
        <h2 class="conciertos__heading">Conciertos</h2>

        <p class="conciertos__fecha">2023</p>
        <?php 
            for ($i=11; $i<13; $i++){
            ?>
        <div class="conciertos__listado slider swiper">
            <div class="swiper-wrapper">
            <?php
            foreach($conciertos[$i] as $concierto){
                if($concierto->año == 2024) continue;
                ?>
            
                <div class="concierto swiper-slide">
                    <p class="concierto__fecha"><?php echo $concierto->dia . " " . $concierto->mes?> </p>
                    <a href="/lista-conciertos">
                        <div class="concierto__card">
                            <img class="concierto__imagen-artista" loading="lazy" width="200" height="300" src= "<?php echo $concierto->imagen?>" alt="Artista">

                            <div class="concierto__informacion">
                                <h4 class="concierto__nombre"><?php echo $concierto->recinto ?></h4>

                                <p class="concierto__ciudad"><?php echo $concierto->ciudad?></p>
                                <p class="concierto__introduccion"></p>
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

        <p class="conciertos__fecha">2024</p>
        <?php 
            for ($i=1; $i<13; $i++){
                if(is_null($conciertos[$i])) continue;
            ?>
        <div class="conciertos__listado slider swiper">
            <div class="swiper-wrapper">
            <?php
            
            foreach($conciertos[$i] as $concierto){
                if($concierto->año == 2023) continue;
                ?>
            
                <div class="concierto swiper-slide">
                    <p class="concierto__fecha"><?php echo $concierto->dia . " " . $concierto->mes?> </p>
                    <a href="/lista-conciertos">
                        <div class="concierto__card">
                            <img class="concierto__imagen-artista" loading="lazy" width="200" height="300" src= "<?php echo $concierto->imagen?>" alt="Artista">

                            <div class="concierto__informacion">
                                <h4 class="concierto__nombre"><?php echo $concierto->recinto ?></h4>

                                <p class="concierto__ciudad"><?php echo $concierto->ciudad?></p>
                                <p class="concierto__introduccion"></p>
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
</main>