<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__formulario">

    <form method="POST" action="/admin/artistas/crear" enctype="multipart/form-data" class="formulario">
        <?php
            include_once __DIR__ . "/formulario.php";
        ?>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Ponente">
    </form>
</div>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/artistas">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>