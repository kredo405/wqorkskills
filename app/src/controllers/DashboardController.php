<?php

namespace app\controllers;

class DashboardController
{
    public function index(): void
    {
        // Логика контроллера
        $message = "Hello, World!";
        // Подключаем представление
        require_once __DIR__ . '/../views/dashboard/dashboard.php';
    }
}