<?php

namespace Controllers;

use Model\Artista;
use MVC\Router;
use Classes\Paginacion;

class ArtistasController {
    public static function index(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $paginaActual = $_GET["page"] ?? "";
        $paginaActual = filter_var($paginaActual, FILTER_VALIDATE_INT);
        if(!$paginaActual || $paginaActual<1){
            header("Location: /admin/artistas?page=1");
        }
        $registrosPagina = 7;
        $totalRegistros = Artista::total();
        $paginacion = new Paginacion($paginaActual, $registrosPagina, $totalRegistros);

        if($paginacion->totalPaginas() < $paginaActual){
            header("Location: /admin/artistas?page=1");
        }

        $artistas = Artista::paginar($registrosPagina, $paginacion->offset());

        $router->render("admin/artistas/index", [ 
            "titulo" => "Artistas / Bandas",
            "artistas" => $artistas,
            "paginacion" => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $alertas = [];
        $artista = new artista;
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $existe = Artista::where("nombre", $_POST["nombre"]);

            if($existe) {
                Artista::setAlerta("error", "El artista ya existe");
                $alertas = Artista::getAlertas();
            }

            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpetaImagenes = "../public/img/artistas/";
                $nombreArchivo = md5(uniqid(rand(), true));
                $archivo = $carpetaImagenes . $nombreArchivo;
                $tipoMime = strtolower(pathinfo($_FILES["imagen"]["full_path"], PATHINFO_EXTENSION));
                $tipoImagen = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                // Permitir solo ciertos formatos de archivo
                $allowedFormats = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($tipoMime, $allowedFormats)) {
                    Artista::setAlerta("error", "Ingrese un tipo de imagen válido");
                }

                //Crear carpeta si no existe
                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes, 0755, true);
                }

                $artista->redes = $_POST["instagram"];
                $artista->imagen = $nombreArchivo;
                $artista->sincronizar($_POST);
                $alertas = $artista->validar();
    
                //Guardar el registro
                if(empty($alertas)){
                    // Intentar mover el archivo al directorio de destino
                    move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo . $tipoImagen);
    
                    //Guardar en la db
                    $artista->imagenActual = $nombreArchivo;
                    $resultado = $artista->guardar();
    
                    if($resultado){
                        header("Location: /admin/artistas");
                    }
                }
            }else {
                Artista::setAlerta("error", "Ingrese una imagen");
                $alertas = Artista::getAlertas();
            }
        }
        $redes = json_decode($artista->redes);

        $router->render("admin/artistas/crear", [ 
            "titulo" => "Registrar Artista / Banda",
            "artista" => $artista,
            "redes" => $redes,
            "alertas" => $alertas
        ]);
    }



    public static function editar (Router $router){
        if(!isAdmin()){
            header("Location: /login");
        }

        $alertas = [];
        //Validar el id
        $id = $_GET["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header("Location: /admin/artistas");
        }

        //Obtener artista
        $artista = Artista::find($id);

        if(!$artista){
            header("Location: /admin/artistas");
        }

        // $artista->imagen = $artista->imagen;
        $redes = json_decode($artista->redes);

        if($_SERVER["REQUEST_METHOD"] === "POST" ){

            $artista->sincronizar($_POST);

            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpetaImagenes = "../public/img/artistas/";
                $nombreArchivo = md5(uniqid(rand(), true));
                $archivo = $carpetaImagenes . $nombreArchivo;
                $tipoMime = strtolower(pathinfo($_FILES["imagen"]["full_path"], PATHINFO_EXTENSION));
                $tipoImagen = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                // Permitir solo ciertos formatos de archivo
                $allowedFormats = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($tipoMime, $allowedFormats)) {
                    Artista::setAlerta("error", "Ingrese un tipo de imagen válido");
                }

                //Crear carpeta si no existe
                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes, 0755, true);
                }

                $artista->redes = $_POST["instagram"];
                $artista->imagen = $nombreArchivo;
                $alertas = $artista->validar();
    
                //Guardar el registro
                if(empty($alertas)){
                    // Intentar mover el archivo al directorio de destino
                    move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo . $tipoImagen);
    
                    //Guardar en la db
                    $artista->imagenActual = $nombreArchivo;
                    $resultado = $artista->guardar();
    
                    if($resultado){
                        header("Location: /admin/artistas");
                    }
                }
            } 
            $resultado = $artista->guardar();
            header("Location: /admin/artistas");
        }

        $router->render("admin/artistas/editar", [ 
            "titulo" => "Editar Artista / Banda",
            "alertas" => $alertas,
            "artista" => $artista,
            "redes" => $redes,
        ]);
    }

    public static function eliminar (){
        if(!isAdmin()){
            header("Location: /login");
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(!isAdmin()){
                header("Location: /login");
            }           
            $id = $_POST["id"];
            $artista = Artista::find($id);

            if(!isset($artista)){
                header("Location: /admin/artistas");
            }

            $resultado = $artista->eliminar();
            if($resultado){
                header("Location: /admin/artistas");
            }
        }

    }
}