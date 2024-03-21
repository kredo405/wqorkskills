<?php

namespace app\models;

use app\database\Database;
use PDOException;

class User
{
    private $conn;

    public function __construct()
    {
        // Создаем экземпляр класса для подключения к базе данных
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($username, $email, $password): bool
    {
        try {
            // Хэшируем пароль
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Подготавливаем запрос для вставки нового пользователя
            $stmt = $this->conn->prepare('INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);

            // Выполняем запрос
            $stmt->execute();

            // Возвращаем true в случае успешного выполнения запроса
            return true;
        } catch (PDOException $e) {
            // Возвращаем false в случае ошибки
            return false;
        }
    }

    public function login(string $email, string $password): bool
    {
        try {
            // Подготовка запроса для выбора пользователя с указанным адресом электронной почты
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute([':email' => $email]);

            // Получение результата
            $user = $stmt->fetch();

            // Если пользователь найден и пароли совпадают
            if ($user && password_verify($password, $user['password_hash'])) {
                // Пользователь успешно вошел в систему
                // Здесь вы можете установить сессию или выполнить другие действия
                return true;
            } else {
                // Неверный адрес электронной почты или пароль
                // Здесь вы можете вернуть ошибку или перенаправить пользователя
                return false;
            }
        } catch (PDOException $e) {
            // Возвращаем false в случае ошибки
            return false;
        }

    }
}
