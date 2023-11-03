<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual("/dashboard") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Inicio
            </span>
        </a>

        <a href="/admin/artistas" class="dashboard__enlace <?php echo pagina_actual("/ponentes") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-microphone dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Ponentes
            </span>
        </a>

        <a href="/admin/conciertos" class="dashboard__enlace <?php echo pagina_actual("/eventos") ? "dashboard__enlace--actual" : ""; ?>">
            <i class="fa-solid fa-calendar dashboard__icono"></i>
            <span class="dashboard__menu--texto">
                Eventos
            </span>
        </a>
    </nav>
</aside>