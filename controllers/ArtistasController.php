<?php

namespace Controllers;

use MVC\Router;

class ArtistasController {
    public static function index(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $router->render("admin/artistas/index", [ 
            "titulo" => "Artistas / Bandas"
        ]);
    }

    public static function crear(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $router->render("admin/artistas/crear", [ 
            "titulo" => "Registrar Artista / Banda"
        ]);
    }

    public static function editar (Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $router->render("admin/artistas/editar", [ 
            "titulo" => "Editar Artista / Banda"

        ]);
    }

    public static function eliminar (){
        if(!isAdmin()){
            header("Location: /login");
        }

    }
}