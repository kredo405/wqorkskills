<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    public function register() {
        $message = "";
        // Проверяем, была ли отправлена форма
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Создаем экземпляр модели пользователя
            $user = new User();

            // Регистрируем нового пользователя
            $result = $user->register($username, $email, $password);

            // Проверяем успешность регистрации
            if ($result) {
                // Редиректим пользователя на страницу успешной регистрации
                header('Location: /dashboard');
                exit;
            } else {
                // Выводим ошибку в случае неудачи
                $message = "Ошибка при регистрации пользователя";
            }
        }

        // Отображаем форму регистрации
        include_once __DIR__ . '/../views/registration/registration.php';
    }

    public function login(): void
    {
        $message = '';
        // Логика обработки запроса на авторизацию
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Обработка отправленной формы авторизации
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $result = $user->login($email, $password);

            // Проверяем успешность регистрации
            if ($result) {
                // Редиректим пользователя на страницу успешной регистрации
                header('Location: /dashboard');
                exit;
            } else {
                // Выводим ошибку в случае неудачи
                $message = "Ошибка при входе в систему";
            }
        }
            // Если запрос не POST, отображаем форму авторизации
            include_once __DIR__ . '/../views/login/login.php'; // Замените на путь к вашему файлу формы
    }
}