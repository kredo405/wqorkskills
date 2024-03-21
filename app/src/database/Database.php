<?php

namespace app\database;

use PDO;
use PDOException;

class Database
{
    private $conn;

    /**
     * Establishes a database connection if it does not exist and returns the connection
     *
     * @return PDO The database connection
     */
    public function getConnection() {
        if (!$this->conn) {
            try {
                // Connect to the database
                $this->conn = new PDO('pgsql:host=postgres;dbname=workskills', 'admin', 'root');
                // Set error handling mode for PDO
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Error connecting to the database: ' . $e->getMessage();
            }
        }
        return $this->conn;
    }
}