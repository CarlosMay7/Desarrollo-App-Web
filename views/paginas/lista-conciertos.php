<main class="listaconciertos">
    <h2 class="listaconciertos__heading"><?php echo $titulo; ?></h2>
    
    <p class="listaconciertos__artista" style="text-align:center;"><?php echo $concierto->nombre?></p>

    <div class="listaconciertos__grid">
        <div class="listaconciertos__imagen">
            <img loading="lazy" width="200" height="300" src="<?php echo $_ENV["HOST"] . "/img/artistas/" . $concierto->imagen; ?>" alt="Artista"> 
        </div>

        <div class="listaconciertos__contenido">
            <p class="listaconciertos__"></p>
            <p class="listaconciertos__ciudad"> Ciudad: <?php echo $concierto->ciudad ?></p>
            <p class="listaconciertos__recinto">Recinto: <?php echo $concierto->recinto ?></p>
            <p class="listaconciertos__fecha">Fecha: <?php echo $concierto->dia . " " . $concierto->mes . " " . $concierto->año ?></p>
            <p class="listaconciertos__descripcion"><?php echo $concierto->descripcion ?></p>
            <?php if ($concierto->tour != NULL){?>
            <p class="listaconciertos__tour"> <?php echo $concierto->tour ?> </p>
            <?php } ?>
            <?php if($concierto->sold_out == 1) { ?>
                <p class="listaconciertos__soldOut"> Este concierto está Sold Out :( </p>
            <?php } else{ ?>
                <p class="listaconciertos__soldOut"> Aún hay Boletos disponibles!!</p>
                <p class="listaconciertos__urlcompra">Puedes comprar tus boletos aquí!!! -> <a href="<?php echo $concierto->url_compra ?>"> <?php echo $concierto->url_compra ?></a></p>
            <?php } ?>

        </div>
    </div>
</main>