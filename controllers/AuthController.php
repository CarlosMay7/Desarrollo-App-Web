<?php

namespace Controllers;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {

        // Render a la vista 
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
        ]);
    }

    public static function registro(Router $router) {
        // Render a la vista
        $router->render('auth/registro', [
            'titulo' => 'Crea tu cuenta'
        ]);
    }

    public static function olvide(Router $router) {
        // Muestra la vista
        $router->render('auth/olvide', [
            'titulo' => 'Olvide mi Contraseña',
        ]);
    }

    public static function reestablecer(Router $router) {        
        // Muestra la vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablecer Contraseña',
        ]);
    }

    public static function mensaje(Router $router) {

        $router->render('auth/mensaje', [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }

    public static function confirmar(Router $router) {

        $router->render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta'
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
       
    }
}