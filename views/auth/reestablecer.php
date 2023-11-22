<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Establece tu Nueva Contraseña</p>

    <?php
        require_once __DIR__ . "/..//templates/alertas.php";
    ?>
        <form class="formulario" method="POST">
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Tu Nueva Contraseña</label>
                <input 
                    type="password"
                    class="formulario__input"
                    placeholder="Tu Nueva Contraseña"
                    id="password"
                    name="password"
                >
            </div>

            <input type="submit" class="formulario__submit" value="Guardar Contraseña">
        </form>

    <div class="acciones">
    <a class="acciones__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="acciones__enlace" href="/registro">¿Aún no tienes cuenta? Crea una</a>
    </div>
</main>