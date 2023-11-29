<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path) : bool {
    return str_contains($_SERVER["PATH_INFO"] ?? "/", $path) ? true : false;
}

function isAuth() : bool {
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION["nombre"]) && !empty($_SESSION);
}

function isAdmin() : bool {
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION["admin"]) && !empty($_SESSION["admin"]);
}

function transformMonths($conciertos){
    $conciertosPorFecha= [];  
    foreach($conciertos as $concierto){

    if ($concierto->mes == 1){
        $concierto->mes = "Enero";
        $conciertosPorFecha[1][]=$concierto;
    }
    if ($concierto->mes == 2){
        $concierto->mes = "Febrero";
        $conciertosPorFecha[2][]=$concierto;
    }
    if ($concierto->mes == 3){
        $concierto->mes = "Marzo";
        $conciertosPorFecha[3][]=$concierto;
    }
    if ($concierto->mes == 4){
        $concierto->mes = "Abril";
        $conciertosPorFecha[4][]=$concierto;
    }
    if ($concierto->mes == 5){
        $concierto->mes = "Mayo";
        $conciertosPorFecha[5][]=$concierto;
    }
    if ($concierto->mes == 6){
        $concierto->mes = "Junio";
        $conciertosPorFecha[6][]=$concierto;
    }
    if ($concierto->mes == 7){
        $concierto->mes = "Julio";
        $conciertosPorFecha[7][]=$concierto;
    }
    if ($concierto->mes == 8){
        $concierto->mes = "Agosto";
        $conciertosPorFecha[8][]=$concierto;
    }
    if ($concierto->mes == 9){
        $concierto->mes = "Septiembre";
        $conciertosPorFecha[9][]=$concierto;
    }
    if ($concierto->mes == 10){
        $concierto->mes = "Octubre";
        $conciertosPorFecha[10][]=$concierto;
    }
    if ($concierto->mes == 11){
        $concierto->mes = "Noviembre";
        $conciertosPorFecha[11][]=$concierto;
    }
    if ($concierto->mes == 12){
        $concierto->mes = "Diciembre";
        $conciertosPorFecha[12][]=$concierto;
    }
}
    return $conciertosPorFecha;
}