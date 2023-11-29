<?php

namespace Controllers;

use MVC\Router;
use Model\Concierto;
use Model\Fecha;
use Model\Artista;
class ConciertosController {
    public static function index(Router $router){

        $conciertos;

        foreach($conciertos as $concierto){
            $concierto->artista = Artista::find($concierto->artista_id);
            $concierto->dia = Fecha::find($concierto->fecha_id);
            $concierto->mes = Fecha::find($concierto->fecha_id);
            $concierto->año = Fecha::find($concierto->fecha_id);

        }
        $router->render("admin/conciertos/index", [ 
            "titulo" => "Conciertos",
            "conciertos" => $conciertos,
            "paginacion" => $paginacion->paginacion()
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