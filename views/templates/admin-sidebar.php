<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/inicio" class="dashboard__enlace <?php echo pagina_actual("/admin/inicio") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Inicio
            </span>
        </a>

        <a href="/admin/artistas" class="dashboard__enlace <?php echo pagina_actual("/artistas") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Artistas
            </span>
        </a>

        <a href="/admin/conciertos" class="dashboard__enlace <?php echo pagina_actual("/conciertos") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Conciertos
            </span>
        </a>
    </nav>
</aside>