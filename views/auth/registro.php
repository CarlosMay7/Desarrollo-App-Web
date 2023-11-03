<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Comienza tu registro aquí</p>

    <form class="formulario" method="POST" action="/registro">
        <div class="formulario__campo">
            <label class="formulario__label" for="nombre">Nombre</label>
            <input 
                type="text"
                class="formulario__input"
                placeholder="Tu Nombre"
                id="nombre"
                name="nombre"
            >
        </div>
        <div class="formulario__campo">
            <label class="formulario__label" for="apellido">Apellido</label>
            <input 
                type="text"
                class="formulario__input"
                placeholder="Tu Apellido"
                id="apellido"
                name="apellido"
            >
        </div>
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
        <div class="formulario__campo">
            <label class="formulario__label" for="password2">Repetir Contraseña</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Repetir Contraseña"
                id="password2"
                name="password2"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a class="acciones__enlace" href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a class="acciones__enlace" href="/olvide">¿Olvidaste tu Contraseña?</a>
    </div>
</main>