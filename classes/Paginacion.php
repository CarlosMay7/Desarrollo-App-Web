<?php

namespace Classes;

class Paginacion {
    /**
     * Variable que contendrá la página actual
     *
     * @var int
     */
    public $paginaActual;

    /**
     * variable que contendrá la cantidad de registros por página
     *
     * @var int
     */
    public $registrosPagina;

    /**
     * total de registros recuperados.
     *
     * @var int
     */
    public $totalRegistros;

    /**
     * Devuelve un objeto de la clase.
     *
     * @param integer $paginaActual
     * @param integer $registrosPagina
     * @param integer $totalRegistros
     */
    public function __construct($paginaActual = 1, $registrosPagina = 10, $totalRegistros = 0){
        $this->paginaActual = (int) $paginaActual;
        $this->registrosPagina = (int) $registrosPagina;
        $this->totalRegistros = (int) $totalRegistros;
    }

/**
 * Calcula el índice de desplazamiento (offset) para la consulta SQL basado en la página actual y la cantidad de registros por página.
 *
 * @return int El índice de desplazamiento para la consulta SQL.
 */
    public function offset(){
        return $this->registrosPagina * ($this->paginaActual - 1);
    }

 /**
 * Calcula el número total de páginas necesarias para mostrar todos los registros paginados.
 *
 * @return int El número total de páginas.
 */   
    public function totalPaginas(){
        return ceil($this->totalRegistros / $this->registrosPagina);
    }

/**
 * Obtiene el número de página anterior a la actual, o falso si no hay página anterior.
 *
 * @return int|bool El número de la página anterior o falso si no hay página anterior.
 */
    public function paginaAnterior(){
        $anterior = $this->paginaActual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

/**
 * Obtiene el número de la página siguiente a la actual, o falso si no hay página siguiente.
 *
 * @return int|bool El número de la página siguiente o falso si no hay página siguiente.
 */
    public function paginaSiguiente(){
        $siguiente = $this->paginaActual + 1;
        return ($siguiente <= $this->totalPaginas()) ? $siguiente : false;
    }

/**
 * Genera el enlace HTML para la página anterior.
 *
 * @return string El código HTML del enlace o una cadena vacía si no hay página anterior.
 */
    public function enlaceAnterior(){
        $html = "";
        if($this->paginaAnterior()){
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaAnterior()}\">&laquo Anterior</a>";
        }
        return $html;  
    }

/**
 * Genera el enlace HTML para la página siguiente.
 *
 * @return string El código HTML del enlace o una cadena vacía si no hay página siguiente.
 */
    public function enlaceSiguiente(){
        $html = "";
        if($this->paginaSiguiente()){
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->paginaSiguiente()}\">Siguiente &raquo</a>";
        }
        return $html;
    }

/**
 * Genera el HTML para los números de página, destacando la página actual.
 *
 * @return string El código HTML de los enlaces de números de página.
 */
    public function numerosPaginas(){
        $html = "";

        for($pagina=1; $pagina<=$this->totalPaginas(); $pagina++){
            if($pagina === $this->paginaActual){
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">$pagina</span>";
            } else {
                $html.= "<a class=\"paginacion__enlace paginacion__enlace--numero\" href=\"?page=$pagina\">$pagina</a>";
            }
        }
        return $html;
    }

/**
 * Genera la estructura HTML completa para la paginación, incluyendo enlaces de página anterior, números de página y enlaces de página siguiente.
 *
 * @return string El código HTML de la estructura completa de paginación o una cadena vacía si no hay suficientes registros para paginar.
 */
    public function paginacion(){
        $html = '';
        if($this->totalRegistros > 1){
            $html .= '<div class="paginacion">';
            $html .= $this->enlaceAnterior();
            $html .= $this->numerosPaginas();
            $html .= $this->enlaceSiguiente();
            $html .= '</div';
        }
        return $html;
    }
}