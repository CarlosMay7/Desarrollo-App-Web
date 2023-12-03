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
            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpetaImagenes = "../public/img/artistas/";
                // basename($_FILES["imagen"]["name"]
                $archivo = $carpetaImagenes . md5(uniqid(rand(), true));
                $tipoImagen = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                // Verificar si es una imagen real o un archivo falso
                $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                if ($check !== false) {
                    echo "El archivo es una imagen - " . $check["mime"] . ".";
                } else {
                    echo "El archivo no es una imagen.";
                }

                // Verificar si el archivo ya existe
                if (file_exists($archivo)) {
                    echo "Lo siento, el archivo ya existe.";
                }

                // Permitir solo ciertos formatos de archivo (en este ejemplo, jpg, jpeg, png, gif)
                $allowedFormats = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($tipoImagen, $allowedFormats)) {
                    echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
                }

                //Crear carpeta si no existe

                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes, 0755, true);
                }
            } 

            $_POST["redes"] = json_encode($_POST["redes"], JSON_UNESCAPED_SLASHES);

            $artista->sincronizar($_POST);

            //Validar 
            $alertas = $artista->validar();

            //Guardar el registro
            if(empty($alertas)){
                // Intentar mover el archivo al directorio de destino
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo)) {
                    echo "El archivo " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subido correctamente.";
                } else {
                    echo "Lo siento, hubo un error al subir tu archivo.";
                }

                //Guardar en la db
                $resultado = $artista->guardar();

                if($resultado){
                    header("Location: /admin/artistas");
                }
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

        $artista->imagenActual = $artista->imagen;
        $redes = json_decode($artista->redes);

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpetaImagenes = "../public/img/artistas/";
                // basename($_FILES["imagen"]["name"]
                $archivo = $carpetaImagenes . md5(uniqid(rand(), true));
                $tipoImagen = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

                // Verificar si es una imagen real o un archivo falso
                $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                if ($check !== false) {
                    echo "El archivo es una imagen - " . $check["mime"] . ".";
                } else {
                    echo "El archivo no es una imagen.";
                }

                // Verificar si el archivo ya existe
                if (file_exists($archivo)) {
                    echo "Lo siento, el archivo ya existe.";
                }

                // Permitir solo ciertos formatos de archivo (en este ejemplo, jpg, jpeg, png, gif)
                $allowedFormats = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($tipoImagen, $allowedFormats)) {
                    echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
                }

                //Crear carpeta si no existe

                if(!is_dir($carpetaImagenes)){
                    mkdir($carpetaImagenes, 0755, true);
                }
            } 

            $_POST["redes"] = json_encode($_POST["redes"], JSON_UNESCAPED_SLASHES);
            $artista->sincronizar($_POST);
            $alertas = $artista->validar();

            //Guardar el registro
            if(empty($alertas)){
                // Intentar mover el archivo al directorio de destino
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo)) {
                    $imagenActual = $archivo;
                    echo "El archivo " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subido correctamente.";
                } else {
                    echo "Lo siento, hubo un error al subir tu archivo.";
                }

                //Guardar en la db
                $resultado = $artista->guardar();

                if($resultado){
                    header("Location: /admin/artistas");
                }
            }
        }

        $router->render("admin/artistas/editar", [ 
            "titulo" => "Editar Artista / Banda",
            "alertas" => $alertas,
            "artista" => $artista,
            "redes" => $redes
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