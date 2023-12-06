<?php  
    include_once __DIR__ . "/conciertos.php";
?>

<section class="artistas">
    <h2 class="artistas__heading">Artistas</h2>
    <p class="artistas__descripcion">¡Conoce a los artistas más destacados!</p>
    <div class="artistas__grid">
    
    <?php foreach($artistas as $artista){ ?>

        <div class="artista">
        <a href="/descrip-artista?artista=<?php echo $artista->id?>">
            <img class="artista__imagen-autor" loading="lazy" width="200" height="300" src="<?php echo $_ENV["HOST"] . "/img/artistas/" . $artista->imagen; ?>" alt="">

            <div class="artista__informacion">
                </a>

                <h4 class="artista__nombre"><?php echo $artista->nombre?></h4>

                <nav class="artista-sociales">
                    <a class="artista-sociales__enlace" rel="noopener noreferrer" target="_blank" href="#">
                        <span class="artista-sociales__"><?php echo $artista->redes?></span>
                    </a> 
                    <a class="artista-sociales__enlace" rel="noopener noreferrer" target="_blank" href="#">
                        <span class="artista-sociales__ocultar">Facebook</span>
                    </a> 
                    <a class="artista-sociales__enlace" rel="noopener noreferrer" target="_blank" href="#">
                        <span class="artista-sociales__ocultar">Facebook</span>
                    </a> 
                    <a class="artista-sociales__enlace" rel="noopener noreferrer" target="_blank" href="#">
                        <span class="artista-sociales__ocultar">Facebook</span>
                    </a> 
                </nav>
                <?php $etiquetas = explode(",", $artista->etiquetas)?>
                <ul class="artista__listado-generos">
                    <?php foreach($etiquetas as $etiqueta){ ?>
                        <li class="artista__genero">
                        <?php echo $etiqueta; }?>
                        </li>
                </ul>
            </div>
        </a>
        </div>

    <?php } ?>

    </div>
</section>