<header class="header">
    <div class="header__contenedor">P
        <nav class="header__navegacion">
            <a href="/">
                <h1 class="header__logo">
                    Concentus
                </h1>
            </a>
            <div class="header__contenedor--enlace">
            <?php if(!isAuth()){ ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesión</a>
                <?php } else { ?>
                <a href="/logout" class="header__enlace">Cerrar Sesión</a>
                <?php if(isAdmin()){ ?>
                        <a href="/admin/inicio" class="header__enlace">Administrar</a> 
                <?php } ?>
            <?php } ?>


            </div>

        </nav>
        <p class = imagegallery__title>LOS MÁS DESTACADOS</p>

    </div>
</header>

<section class = "imagegallery">
    <a href="https://www.ticketmaster.com.mx/vive-latino-boletos/artist/1209767" target="_blank" class="imagegallery__enlace"><img class = "imagegallery__img"src="https://img.chilango.com/2023/11/vive-latino-2024-cartel-1-1024x995.png" alt=""></a>
    <a href="https://www.ticketmaster.com.mx/tecate-pal-norte-boletos/artist/2000582" target="_blank" class="imagegallery__enlace"><img class = "imagegallery__img"src="https://prismic-images.tmol.io/ticketmaster-tm-mx/e12248cf-2830-4383-8d09-76715cd3bb1c_TPN24+Poster+Por+Di%CC%81a_POST.png?auto=compress,format" alt=""></a>
    <a href="https://luismigueloficial.com/tour" target="_blank"class="imagegallery__enlace"><img class = "imagegallery__img"src="https://arturortiz.com.mx/wp-content/uploads/2023/04/Luis-Miguel-fechas-tour-2023.jpg" alt=""></a>
    <a href="https://www.oliviarodrigo.com/tour/" target="_blank" class="imagegallery__enlace"><img class = "imagegallery__img"src="https://th.bing.com/th/id/OIP.xqc2GHjPBie9KlmNDxTc0QHaHa?pid=ImgDet&rs=1" alt=""></a>
    <a href="https://www.ticketmaster.com.mx/search?q=taylor%20swift" target="_blank" class="imagegallery__enlace"><img class = "imagegallery__img" src="https://assets.intoleranciadiario.com/media/images/imagen-2023-06-03-102154598-1685809334837.png" alt=""></a>
</section>

<div class="barra">
    <div class="barra__contenido">
        <a class="barra__logo" href="/">
            <h2>
                Concentus
            </h2>
        </a>

        <nav class="navegacion">
            <a href="/nosotros" class="navegacion__enlace <?php echo pagina_actual("/nosotros") ? "navegacion__enlace--actual" : ""; ?>">Nosotros</a>
            <a href="/mis-conciertos" id="mis-conciertos" class="navegacion__enlace <?php echo pagina_actual("/paquetes") ? "navegacion__enlace--actual" : ""; ?>">Mis Conciertos</a>
            <a href="/conciertos" class="navegacion__enlace <?php echo pagina_actual("/conciertos") ? "navegacion__enlace--actual" : ""; ?>">Conciertos</a>
        </nav>
    </div>
</div>