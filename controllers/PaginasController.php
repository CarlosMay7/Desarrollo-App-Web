<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {

        $router->render("/paginas/index", [
            "titulo" => "Inicio"
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

        $router->render("/paginas/conciertos", [
            "titulo" => "Próximos Conciertos"
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