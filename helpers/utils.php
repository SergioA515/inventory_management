<?php
require_once('config/params.php');
// Obtén la URL solicitada
function requireClassFile($className) {
    $classFile = url_init . '/controllers/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
}

// Obtén la URL solicitada
$url = $_SERVER['REQUEST_URI'];

// Elimina cualquier parámetro de la URL
$url = strtok($url, '?');

// Rutas disponibles y sus correspondientes controladores y acciones
$routes = [
    '/productos' => ['ProductoController', 'verProductos'], ['ProductoController', 'edicionProductos'],
    '/mayoristas' => ['MayoristaController', 'verMayoristas'],
    '/pedidos' => ['PedidoController', 'verPedidos']
    // Agrega más rutas según tus necesidades
];

// Verifica si la ruta solicitada existe en las rutas disponibles
if (array_key_exists($url, $routes)) {
    // Obtiene el controlador y la acción correspondientes a la ruta
    [$controllerName, $action] = $routes[$url];

    // Requerir el archivo del controlador
    requireClassFile($controllerName);

    // Verificar si la clase del controlador existe
    if (class_exists($controllerName)) {
        // Crear una instancia del controlador
        $controller = new $controllerName();

        // Verificar si la acción existe en el controlador
        if (method_exists($controller, $action)) {
            // Llamar a la acción del controlador
            $controller->$action();
        } else {
            // Acción no encontrada, mostrar un error o redirigir a una página de error
            echo 'Error: Acción no encontrada';
        }
    } else {
        // Controlador no encontrado, mostrar un error o redirigir a una página de error
        echo 'Error: Controlador no encontrado';
    }
} else {
    // Ruta no encontrada, mostrar un error o redirigir a una página de error
    echo 'Error: Ruta no encontrada';
}