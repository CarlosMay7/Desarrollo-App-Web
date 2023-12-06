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
                        <div class="concierto__card">
                            <a href="/lista-conciertos?concierto=<?php echo $concierto->id?>">
                                <img class="concierto__imagen-artista" loading="lazy" width="200" height="300" src= "<?php echo $concierto->imagen?>" alt="Artista">
                            </a>
                        <div class="concierto__informacion">
                            <h4 class="concierto__nombre"><?php echo $concierto->recinto ?></h4>
                            <p class="concierto__ciudad"><?php echo $concierto->ciudad?></p>

                            <div class="concierto__introduccion">
                                <svg concierto-id = "<?php echo $concierto->id?>" xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z"/>
                                </svg>

                                <p class="concierto__artista-nombre"><?php echo $concierto->nombre ?></p>

                            </div>
                        </div>
                    </div>
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
                    <a href="/lista-conciertos?concierto=<?php echo $concierto->id?>">
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