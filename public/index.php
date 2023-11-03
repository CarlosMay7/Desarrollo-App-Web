<?php 

require_once __DIR__ . '/../includes/app.php';
include __DIR__ . '/../Router.php';
use Controllers\Apiconciertos;
use Controllers\ApiArtistas;
use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\ConciertosController;
use Controllers\PaginasController;
use Controllers\ArtistasController;

$router = new Router();

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

//Area de administracion
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/artistas', [ArtistasController::class, 'index']);
$router->get('/admin/artistas/crear', [ArtistasController::class, 'crear']);
$router->post('/admin/artistas/crear', [ArtistasController::class, 'crear']);
$router->get('/admin/artistas/editar', [ArtistasController::class, 'editar']);
$router->post('/admin/artistas/editar', [ArtistasController::class, 'editar']);
$router->post('/admin/artistas/eliminar', [ArtistasController::class, 'eliminar']);

$router->get('/admin/conciertos', [ConciertosController::class, 'index']);
$router->get('/admin/conciertos/crear', [ConciertosController::class, 'crear']);
$router->post('/admin/conciertos/crear', [ConciertosController::class, 'crear']);
$router->get('/admin/conciertos/editar', [ConciertosController::class, 'editar']);
$router->post('/admin/conciertos/editar', [ConciertosController::class, 'editar']);
$router->post('/admin/conciertos/eliminar', [ConciertosController::class, 'eliminar']);

//API 
$router->get('/api/conciertos-horario', [Apiconciertos::class, 'index']);
$router->get('/api/artistas', [ApiArtistas::class, 'index']);
$router->get('/api/ponente', [ApiArtistas::class, 'ponente']);

//Area Publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/mis-conciertos', [PaginasController::class, 'misConciertos']);
$router->get('/lista-conciertos', [PaginasController::class, 'listaConciertos']);
$router->get('/conciertos', [PaginasController::class, 'conciertos']);

$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();