<?php

namespace app\controllers;

class HomeController
{
    public function index() {
        // Логика контроллера
        $message = "Hello, World!";
        // Подключаем представление
        require_once __DIR__ . '/../views/home/home.php';
        ;
    }
}