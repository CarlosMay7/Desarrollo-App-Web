<?php

namespace Controllers;
use Model\Concierto;
use Model\Artista;
use Model\Fecha;
use Model\Tour;
use Model\ConciertosDeTour;
use Model\Usuario;
use MVC\Router;

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

    public static function guardarMisConciertos() {
        $misConciertos = implode(",",$_POST["conciertos"]);
        $usuario = Usuario::find($_SESSION["id"]);
        $usuario->conciertos = $misConciertos;
        $usuario->guardar();

        header("Location: /mis-conciertos");
    }
    public static function misConciertos(Router $router) {

        if(!isAuth()){
            header("Location: /login");
        }
        $usuario = Usuario::find($_SESSION["id"]);

        $misConciertos = [];

        if($usuario->conciertosGuardados != NULL) {
            $conciertosUsuario = explode(",", $usuario->conciertosGuardados);
        }else{
            $conciertosUsuario = [];
        }

        if(isset($_COOKIE["mis-conciertos"]) && $_COOKIE["mis-conciertos"] != "null"){
            if($conciertosUsuario != NULL){
            $conciertosAgregados = json_decode($_COOKIE["mis-conciertos"], true);
            $conciertos = array_unique(array_merge($conciertosUsuario, $conciertosAgregados));
        }else{
            $conciertos = json_decode($_COOKIE["mis-conciertos"], true);
        }
            foreach($conciertos as $concierto) {
                if(!in_array($concierto, $misConciertos)) {
                    $misConciertos[] = Concierto::find($concierto);

                } else {
                    continue;
                }
            }

            foreach($misConciertos as $concierto){
                $concierto->artista = Artista::find($concierto->artista_id);
                $artista  = Artista::find($concierto->artista_id);
                $concierto->imagen = $artista->imagen;
                $concierto->nombre = $artista->nombre;
                $fecha = Fecha::find($concierto->fecha_id);
                $concierto->dia = $fecha->dia;
                $concierto->mes = $fecha->mes;
                $concierto->año = $fecha->año;
                $concierto = transformMonthsforOne($concierto);
            }

        
        }

        $router->render("/paginas/mis-conciertos", [
            "titulo" => "Revisa tus conciertos aquí",
            "misConciertos" => $misConciertos
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
       
        $id = $_GET["concierto"];
        $concierto = Concierto::find($id);
        $artista  = Artista::find($concierto->artista_id);
        $concierto->imagen = $artista->imagen;
            $concierto->nombre = $artista->nombre;
            $fecha = Fecha::find($concierto->fecha_id);
            $concierto->dia = $fecha->dia;
            $concierto->mes = $fecha->mes;
            $concierto->año = $fecha->año;
        $tour = ConciertosDeTour::where("concierto_id", $concierto->id);
        
        if($tour != NULL){
            $tour = Tour::find($tour->tour_id);
            $concierto->tour = $tour->nombre;
        }else {
            $concierto->tour = NULL;
        }
        
        $concierto = transformMonthsforOne($concierto);
        $router->render("/paginas/lista-conciertos", [
            "titulo" => "Información completa del Concierto",
            "concierto" => $concierto
        ]);
    }

    public static function descripcionArtistas(Router $router) {
        $id = $_GET["artista"];
        $artista = Artista::find($id);
        $conciertos = Concierto::ordenar("artista_id", "ASC");
        $conciertosPorArtista = [];
        foreach($conciertos as $concierto){
            if($concierto->artista_id == $id){
                $fecha = Fecha::find($concierto->fecha_id);
                $concierto->dia = $fecha->dia;
                $concierto->mes = $fecha->mes;
                $concierto->año = $fecha->año;
                $concierto = transformMonthsforOne($concierto);
                $conciertosPorArtista[] = $concierto;
            }
        }

        $router->render("/paginas/descrip-artista", [
            "titulo" => "Información del Artista",
            "artista" => $artista,
            "conciertos" => $conciertosPorArtista]);
        
    }
    

}