<?php

namespace Controllers;

use Model\Artista;

class ApiArtistas {
    public static function index (){
        $artistas = Artista::all();
        echo json_encode($artistas);
    }

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