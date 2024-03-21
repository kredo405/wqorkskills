<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use app\controllers\DashboardController;
use app\controllers\HomeController;
use app\controllers\UserController;

// Маршрутизация запросов
$request_uri = $_SERVER['REQUEST_URI'];
switch ($request_uri) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/login':
        $controller = new UserController();
        $controller->login();
        break;
    case '/registration':
        $controller = new UserController();
        $controller->register();
        break;
    case '/dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;
    default:
        // Обработка ошибки 404
        http_response_code(404);
        echo "Страница не найдена";
        break;
}
