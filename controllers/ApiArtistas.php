<?php

namespace Controllers;

use Model\Artista;

class ApiArtistas {
/**
 * Devuelve un JSON con todos los artistas
 * 
 * 
 * @return JSON
 * 
 */
    public static function index (){
        $artistas = Artista::all();
        echo json_encode($artistas);
    }
/**
 * Devuelve un JSON con el artista seleccionado
 * 
 * 
 * @return JSON
 * 
 */


    public static function artista(){
        $id = $_GET["id"];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id || $id < 1){
            echo json_encode([]);
            return;
        }

        $artista = Artista::find($id);
        echo json_encode($artista, JSON_UNESCAPED_SLASHES);

    }
}