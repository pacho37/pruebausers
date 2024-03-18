<?php
class DatabaseConnection {
    private $conn;

    public function __construct($servername, $username, $password, $database) {
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        } else {
            // echo "Conectado correctamente a la base de datos";
        }
    }

    public function executeQuery($query) {
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error en la consulta: " . $this->conn->error);
        }

        return $result;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

// Uso de la clase para conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "usuarios";

$databaseConnection = new DatabaseConnection($servername, $username, $password, $database);
$enlace = $databaseConnection->getConnection();
?>
