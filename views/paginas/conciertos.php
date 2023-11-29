<main class="agenda">
    <h2 class="agenda__heading"><?php echo $titulo; ?></h2>
    <p class="agenda__descripcion">Los mejores conciertos en la palma de tu mano</p>

    <div class="conciertos">
        <h2 class="conciertos__heading">Conciertos</h2>
        <p class="conciertos__fecha">Octubre</p>


        <div class="conciertos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($conciertos as $concierto){?>
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
                <?php } ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <p class="conciertos__fecha">Noviembre</p>

        <div class="conciertos__listado slider swiper">
            <div class="swiper-wrapper">
            <?php for($i = 0; $i<15; $i++){?>
                <div class="concierto swiper-slide">
                    <p class="concierto__fecha"> <?php echo $i+5?> noviembre</p>

                    <a href="/lista-conciertos">
                        <div class="concierto__card">
                            <img class="concierto__imagen-artista" loading="lazy" width="200" height="300" src="https://tse4.mm.bing.net/th?id=OIP.V5Ao2Q9UoNeRjJOHHGhh5gHaEK&pid=Api&P=0&h=180" alt="Artista">

                            <div class="concierto__informacion">
                                <h4 class="concierto__nombre">Nadie Sabe Lo Que Va A Pasar Mañana</h4>

                                <p class="concierto__ciudad">CDMX</p>
                                <p class="concierto__introduccion">Most Wanted</p>
                                <p class="concierto__artista-nombre">Bad Bunny</p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</main>