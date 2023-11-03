<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia Sesión en Concentus</p>

    <form class="formulario" method="POST" action="/login">
        <div class="formulario__campo">
            <label class="formulario__label" for="email">E-Mail</label>
            <input 
                type="email"
                class="formulario__input"
                placeholder="Tu E-Mail"
                id="email"
                name="email"
            >
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="password">Contraseña</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Tu Contraseña"
                id="password"
                name="password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/registro">¿Aún no tienes cuenta? Crea una</a>
        <a class="acciones__enlace" href="/olvide">¿Olvidaste tu Password?</a>
    </div>
</main>