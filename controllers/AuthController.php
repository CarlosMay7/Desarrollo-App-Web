<?php

namespace Controllers;
use MVC\Router;
use Model\Usuario;
use Classes\Email;

/**
 * El controlador de la autenticación del programa
 * 
 * 
 * @version 1.0.0
 * 
 */
class AuthController {

    /**
     * Muestra la página de login del programa y se encarga de validar el usuario 
     * que intenta iniciar sesión
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function login(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();
            
            if(empty($alertas)) {
                // Verificar quel el usuario exista
                $usuario = Usuario::where('email', $usuario->email);
                if(!$usuario || !$usuario->confirmado ) {
                    Usuario::setAlerta('error', 'El Usuario No Existe o no esta confirmado');
                } else {
                    // El Usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        
                        // Iniciar la sesión
                        session_start();    
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['apellido'] = $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['admin'] = $usuario->admin ?? 0;

                        //Redireccion
                        if($usuario->admin){
                            header("Location: /admin/inicio");
                        } else {
                            header("Location: /mis-conciertos");
                        }
                        
                    } else {
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        // Render a la vista 
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    /**
     * Muestra la página de registro de un nuevo usuario y se encarga de validar el usuario 
     * para crear una nueva cuenta y mandar el correo de confirmación
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function registro(Router $router) {
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            
            $alertas = $usuario->validar_cuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Generar el Token
                    $usuario->crearToken();

                    // Crear un nuevo usuario
                    $resultado =  $usuario->guardar();

                    // Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);              
                    $email->enviarConfirmacion();

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta en Concentus',
            'usuario' => $usuario, 
            'alertas' => $alertas
        ]);
    }

    /**
     * Muestra la página de olvide mi contraseña y se encarga de validar el usuario
     * para mandar el correo de reestablecer la contraseña
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function olvide(Router $router) {
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();

            if(empty($alertas)) {
                // Buscar el usuario
                $usuario = Usuario::where('email', $usuario->email);

                if($usuario && $usuario->confirmado) {

                    // Generar un nuevo token
                    $usuario->crearToken();
                    unset($usuario->password2);

                    // Actualizar el usuario
                    $usuario->guardar();

                    // Enviar el email
                    $email = new Email( $usuario->email, $usuario->nombre, $usuario->token );
                    $email->enviarInstrucciones();


                    // Imprimir la alerta
                    // Usuario::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');

                    $alertas['exito'][] = 'Hemos enviado las instrucciones a tu email';
                } else {
                 
                    // Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');

                    $alertas['error'][] = 'El Usuario no existe o no esta confirmado';
                }
            }
        }

        // Muestra la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi Password',
            'alertas' => $alertas
        ]);
    }

    /**
     * Muestra la página de reestablecer contraseña y se encarga de validar el usuario 
     * para reestablecer la contraseña 
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function reestablecer(Router $router) {

        $token = s($_GET['token']);

        $token_valido = true;

        if(!$token) header('Location: /');

        // Identificar el usuario con este token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token No Válido, intenta de nuevo');
            $token_valido = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validarPassword();

            if(empty($alertas)) {
                $usuario->hashPassword();

                $usuario->token = "";

                $resultado = $usuario->guardar();

                if($resultado) {
                    header('Location: /login');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'token_valido' => $token_valido
        ]);
    }

    /**
     * Muestra la página de mensaje de cuenta creada exitosamente
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function mensaje(Router $router) {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }

    /**
     * Muestra la página donde se confirma la cuenta del usuario
     * 
     * @param Router $router Objeto Router para renderizar la vista
     * @return void
     * 
     */
    public static function confirmar(Router $router) {
        
        $token = s($_GET['token']);

        if(!$token) header('Location: /');

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token No Válido, la cuenta no pudo ser confirmada');
        } else {
            $usuario->confirmado = 1;
            $usuario->token = '';
            unset($usuario->password2);
            
            $usuario->guardar();

            Usuario::setAlerta('exito', 'Cuenta Comprobada Exitosamente');
        }

     

        $router->render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta Concentus',
            'alertas' => Usuario::getAlertas()
        ]);
    }

    /**
     * Se encarga de cerrar la sesión del usuario
     * 
     * 
     * @return void
     * 
     */
    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');    
    }
}