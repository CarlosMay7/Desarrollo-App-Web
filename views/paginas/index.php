<?php  
    include_once __DIR__ . "/conciertos.php";
?>

<section class="artistas">
    <h2 class="artistas__heading">Artistas</h2>
    <p class="artistas__descripcion">Checa a los artistas más destacados</p>
    <div class="artistas__grid">
    
    <?php for($i=0; $i<7; $i++){ ?>

        <div class="artista">
            <img class="artista__imagen-autor" loading="lazy" width="200" height="300" src="https://tse4.mm.bing.net/th?id=OIP.V5Ao2Q9UoNeRjJOHHGhh5gHaEK&pid=Api&P=0&h=180" alt="">

            <div class="artista__informacion">
                <h4 class="artista__nombre">Bad Bunny</h4>

                <p class="artista__ubicacion">Puerto Rico</p>

                <nav class="artista-sociales">
                    <a class="artista-sociales__enlace" rel="noopener noreferrer" target="_blank" href="#">
                        <span class="artista-sociales__ocultar">Facebook</span>
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

                <ul class="artista__listado-generos">
                        <li class="artista__genero">
                            Bonito
                        </li>
                        <li class="artista__genero">
                            Cantante
                        </li>
                </ul>
            </div>
        </div>

    <?php } ?>

    </div>
</section>