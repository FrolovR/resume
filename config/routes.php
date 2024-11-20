<?php
require_once '../app/controllers/MainController.php';
require_once '../app/controllers/admin/AdminController.php';
require_once '../app/controllers/admin/AboutController.php';
require_once '../app/controllers/ContactsController.php';

// Определяем маршруты с регулярными выражениями для динамических параметров
$routes = [
    '/' => [MainController::class, 'index'],
    'main/index' => [MainController::class, 'index'],
    'main/test' => [MainController::class, 'test'],
    'form/index' => [ContactsController::class, 'submitForm'],

    // Админка
    'admin' => [AdminController::class, 'index'],
    'admin/index' => [AdminController::class, 'index'],
    'admin/login' => [AdminController::class, 'login'],
    'admin/logout' => [AdminController::class, 'logout'],
    'admin/about' => [AboutController::class, 'aboutRead'],
    'admin/about/create' => [AboutController::class, 'aboutCreate'],
    'admin/about/read' => [AboutController::class, 'aboutRead'],
    'admin/about/delete/{id}' => [AboutController::class, 'aboutDelete'],
    'admin/about/update/{id}' => [AboutController::class, 'aboutUpdate'],
];

// Получаем текущий путь, используя параметры GET
$requestPath = 'main/index'; // Значение по умолчанию

if (isset($_GET['controller']) || isset($_GET['action'])) {
    $requestPath = trim(($_GET['controller'] ?? '') . '/' . ($_GET['action'] ?? ''), '/');
}

// Устанавливаем действия по умолчанию
$controller = null;
$action = null;
$routeParams = [];

// Функция для поиска маршрута с динамическими параметрами
function matchRoute($requestPath, $routes)
{
    foreach ($routes as $route => $handler) {
        // Создаем регулярное выражение для поиска параметров в маршруте
        $pattern = '#^' . preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route) . '$#';

        if (preg_match($pattern, $requestPath, $matches)) {
            // Убираем первый элемент из matches, так как это сам маршрут (не параметр)
            array_shift($matches);
            return [$handler, $matches];
        }
    }
    return null;
}

// Проверяем, существует ли маршрут
$routeMatch = matchRoute($requestPath, $routes);

if ($routeMatch) {
    list($handler, $routeParams) = $routeMatch;
    list($controller, $action) = $handler;
} else {
    // Обработка несуществующих маршрутов
    http_response_code(404);
    echo "404 Not Found: Маршрут не найден";
    exit;
}

// Создаем экземпляр контроллера и вызываем действие
$controllerInstance = new $controller();

// Проверка существования метода действия в контроллере
if (method_exists($controllerInstance, $action)) {
    // В зависимости от наличия параметров, передаем их в метод
    call_user_func_array([$controllerInstance, $action], $routeParams);
} else {
    // Если метод не существует
    http_response_code(404);
    echo "404 Not Found: Метод не найден";
    exit;
}
