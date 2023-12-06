<?php

namespace Controllers;
use MVC\Router;
/**
 * El controlador del inicio del panel de administración
 * 
 * 
 * @version 1.0.0
 * 
 */
class DashboardController {
    /**
 * Muestra la página principal del programa del panel de administración
 * 
 * @param Router $router Objeto Router para renderizar la vista
 * @return void
 * 
 */
    public static function index(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $router->render("admin/dashboard/index", [ 
            "titulo" => "Panel de Administración"
        ]);
    }
}