<p><?php echo $titulo?> </p>

<p><?php echo $artista->nombre;
    echo $artista->imagen;
    echo $artista->id;
    echo $artista->redes;
    ?>
</p>
   <?php foreach($conciertos as $concierto){ ?>
    <p>
        <?php echo $concierto->ciudad . " ";
        echo $concierto->recinto . " " . $concierto->dia . " " . $concierto->mes . " " . $concierto->año;} ?>
     </p>

