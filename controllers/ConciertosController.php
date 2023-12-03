<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Fecha;
use Model\Concierto;
use Model\Artista;

class ConciertosController {
    public static function index(Router $router){

        if(!isAdmin()){
            header("Location: /login");
        }

        $paginaActual = $_GET["page"] ?? "";
        $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);

        if(!$paginaActual || $paginaActual < 1){
            header("Location: /admin/conciertos?page=1");
        }

        $registrosPagina = 10;
        $totalRegistros = Concierto::total();
        $paginacion = new Paginacion($paginaActual, $registrosPagina, $totalRegistros);

        $conciertos = Concierto::paginar($registrosPagina, $paginacion->offset());

        foreach($conciertos as $concierto) {
            $concierto->artista = Artista::find($concierto->artista_id)->nombre;
            $fecha = Fecha::find($concierto->fecha_id);
            $concierto->dia = $fecha->dia;
            $concierto->mes = $fecha->mes;
            $concierto->año = $fecha->año;        
        }

        $router->render("admin/conciertos/index", [ 
            "titulo" => "Conciertos",
            "conciertos" => $conciertos,
            "paginacion" => $paginacion->paginacion(),
        ]);
    }

    public static function crear(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $alertas = [];
        $concierto = new Concierto;

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $fecha = Fecha::whereArray([
                "dia" => $_POST["dia"],
                "mes" => $_POST["mes"],
                "año" => $_POST["año"]
            ]);

            if($fecha) {
                unset($_POST["dia"]);
                unset($_POST["mes"]);
                unset($_POST["año"]);
                $_POST["fecha_id"] = $fecha[0]->id;
            } else {
                $fecha = new Fecha([
                    "dia" => $_POST["dia"],
                    "mes" => $_POST["mes"],
                    "año" => $_POST["año"]
                ]);
                $fecha->guardar();
                $_POST["fecha_id"] = $fecha->id;
            }

            $concierto->sincronizar($_POST);
            $alertas = $concierto->validar();

            if(empty($alertas)){
                $resultado = $concierto->guardar();

                if($resultado){
                    header("Location: /admin/conciertos");
                }
            }    
        }

        $router->render("admin/conciertos/crear", [ 
            "titulo" => "Registrar Concierto",
            "concierto" => $concierto,
            "alertas" => $alertas
        ]);
    }

    public static function editar(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $alertas = [];
        $id = $_GET["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
            header("Location: /admin/conciertos");
        }

        $concierto = Concierto::find($id);
        $fecha = Fecha::find($concierto->fecha_id);
        $concierto->dia = $fecha->dia;
        $concierto->mes = $fecha->mes;
        $concierto->año = $fecha->año;
        if(!$concierto){
            header("Location: /admin/conciertos");
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(!isAdmin()){
                header("Location: /login");
            }  
            $concierto->sincronizar($_POST);
            $alertas = $concierto->validar();

            if(empty($alertas)){
                $resultado = $concierto->guardar();

                if($resultado){
                    header("Location: /admin/conciertos");
                }
            }
        }

        $router->render("admin/conciertos/editar", [ 
            "titulo" => "Editar Concierto",
            "alertas" => $alertas,
            "concierto" => $concierto
        ]);
    }

    public static function eliminar (){

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(!isAdmin()){
                header("Location: /login");
            }           
            $id = $_POST["id"];
            $concierto = Concierto::find($id);

            if(!isset($concierto)){
                header("Location: /admin/conciertos");
            }

            $resultado = $concierto->eliminar();
            if($resultado){
                header("Location: /admin/conciertos");
            }
        }
    }
}