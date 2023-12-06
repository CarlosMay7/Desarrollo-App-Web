<?php
namespace Model;

class Artista extends ActiveRecord {
    protected static $tabla = 'artistas';
    protected static $columnasDB = ['id', 'nombre', 'imagen', 'etiquetas', 'redes', 'descripcion'];

    public $id;
    public $nombre;
    public $imagen;
    public $imagenActual;
    public $etiquetas;
    public $redes;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->imagenActual = $args['imagenActual'] ?? '';
        $this->etiquetas = $args['etiquetas'] ?? '';
        $this->redes = $args ["redes"] ?? "";
        $this->descripcion =$args['descripcion'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        
        if(!$this->etiquetas) {
            self::$alertas['error'][] = 'Debe tener al menos una etiqueta';
        }
    
        return self::$alertas;
    }

}