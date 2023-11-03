<?php

namespace Controllers;

use MVC\Router;

class ConciertosController {
    public static function index(Router $router){
        $router->render("admin/conciertos/index", [ 
            "titulo" => "Conciertos"
        ]);
    }

    public static function crear(Router $router){
        $router->render("admin/conciertos/crear", [ 
            "titulo" => "Registrar Concierto"
        ]);
    }

    public static function editar(Router $router){
        $router->render("admin/conciertos/editar", [ 
            "titulo" => "Editar Concierto"
        ]);
    }

    public static function eliminar (){

    }
}