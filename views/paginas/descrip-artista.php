<main class="descripcionartistas">
    <h2 class="descripcionartistas__heading"><?php echo $titulo; ?></h2>

    <div class="descripcionartistas__grid">
            <div class="descripcionartistas__imagen">
                <img loading="lazy" width="100" height="200" src="<?php echo $_ENV["HOST"] . "/img/artistas/" . $artista->imagen; ?>" alt="Artista">
            </div>

            <div class="descripcionartistas__contenido">
                <div class="tab">
                    <button class="tablinks defaultOpen" id="descripcion-btn">Descripción</button>
                    <button class="tablinks" id="conciertos-btn">Conciertos</button>
                </div>

                <div id="Descripcion" class="tabcontent active">
                    <p class="descripcionartistas__texto"><?php echo $artista->descripcion ?></p>
                </div>

                <div id="Conciertos" class="tabcontent">

                    <?php foreach ($conciertos as $concierto) { ?>
                        <p>
                        <a href="/lista-conciertos?concierto=<?php echo $concierto->id?>" class="descripcionartistas__link">
                    <?php echo $concierto->ciudad . "-" . $concierto->recinto . "   ---   " . $concierto->dia . " de  " . $concierto->mes . " del " . $concierto->año;} ?>
                        </a>
                        </p>
                </div>
            </div>
    </div>
    </div>
</main>