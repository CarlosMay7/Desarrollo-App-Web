<?php
namespace Model;

/**
 * Clase que representa un artista.
 * 
 * @extends ActiveRecord Clase padre que contiene todas las funcionalidades para
 * operar con la base de datos.
 */
class Artista extends ActiveRecord {
    /**
     * Nombre de la tabla de artistas en la base de datos.
     *
     * @var string
     */
    protected static $tabla = 'artistas';

    /**
     * Arreglo que contiene las columnas de la tabla de artistas.
     *
     * @var array
     */
    protected static $columnasDB = ['id', 'nombre', 'imagen', 'etiquetas', 'redes', 'descripcion'];

    /**
     * Atributo que contiene el ID del artista
     *
     * @var mixed
     */
    public $id;
    
    /**
     * Atributo que contiene el nombre del artista
     *
     * @var string
     */
    public $nombre;

    /**
     * Atributo que contiene el nombre de la imagen del artista

     *
     * @var string
     */
    public $imagen;

    /**
     * Atributo que contiene el nombre de la imagen actual del artista
     *
     * @var string
     */
    public $imagenActual;

    /**
     * Atributo que contiene las etiquetas del artista
     *
     * @var Array
     */
    public $etiquetas;

    /**
     * Atributo que contiene las redes del artista.
     *
     * @var Array
     */
    public $redes;

    /**
     * Atributo que contiene la descripción del artista.
     *
     * @var string
     */
    public $descripcion;

 /**
 * Constructor de un nuevo objeto Artista
 * 
 * @param Array $args Arreglo con los datos a insertar en la base de datos
 * 
 * @return Artista
 * 
 */
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->imagenActual = $args['imagenActual'] ?? '';
        $this->etiquetas = $args['etiquetas'] ?? '';
        $this->redes = $args ["redes"] ?? "";
        $this->descripcion = $args ["descripcion"] ?? "";
    }

 /**
 * validación de los datos ingresados para crear un nuevo artista
 * 
 *
 * @return Array Arreglo con los mensajes de error
 * 
 */
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->etiquetas) {
            self::$alertas['error'][] = 'Debe tener al menos dos etiquetas';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'Debe agregar una descripción del artista';
        }
    
        return self::$alertas;
    }
}