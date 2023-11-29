<?php

namespace Controllers;
use Model\Concierto;
use Model\Artista;
use Model\Fecha;
use Model\Tour;

use MVC\Router;
use includes\funciones;
class PaginasController {
    public static function index(Router $router) {
        $conciertos = Concierto::ordenar("fecha_id", "ASC");
         
        foreach($conciertos as $concierto){

            $concierto->artista = Artista::find($concierto->artista_id);
            $artista  = Artista::find($concierto->artista_id);
            $concierto->imagen = $artista->imagen;
            $concierto->nombre = $artista->nombre;
            $fecha = Fecha::find($concierto->fecha_id);
            $concierto->dia = $fecha->dia;
            $concierto->mes = $fecha->mes;
            $concierto->año = $fecha->año;
            

            
        }
        $conciertosPorFecha = transformMonths($conciertos);

        $artistas = Artista:: ordenar("id", "ASC");

        $router->render("/paginas/index", [
            "titulo" => "Inicio",
            "conciertos" => $conciertosPorFecha,
            "artistas" => $artistas
        ]);
    }

    public static function nosotros(Router $router) {

        $router->render("/paginas/concentus", [
            "titulo" => "Sobre Concentus"
        ]);
    }
    public static function misConciertos(Router $router) {


        $router->render("/paginas/mis-conciertos", [
            "titulo" => "Revisa tus conciertos aquí"
        ]);
    }

    public static function conciertos(Router $router) {
        $conciertos = Concierto::ordenar("fecha_id", "ASC");
         
        foreach($conciertos as $concierto){

            $concierto->artista = Artista::find($concierto->artista_id);
            $artista  = Artista::find($concierto->artista_id);
            $concierto->imagen = $artista->imagen;
            $concierto->nombre = $artista->nombre;
            $fecha = Fecha::find($concierto->fecha_id);
            $concierto->dia = $fecha->dia;
            $concierto->mes = $fecha->mes;
            $concierto->año = $fecha->año;
            

            
        }
        $conciertosPorFecha = transformMonths($conciertos);

        $router->render("/paginas/conciertos", [
            "titulo" => "Próximos Conciertos",
            "conciertos" => $conciertosPorFecha
        ]);
    }

    public static function error(Router $router) {

        $router->render("/paginas/error", [
            "titulo" => "Página No Encontrada"
        ]);
    }

    public static function listaConciertos(Router $router) {

        $router->render("/paginas/lista-conciertos", [
            "titulo" => "Bad Bunny"
        ]);
    }

}