<?php
    class MySQLPDO {
        private $host;
        private $username;
        private $password;
        private $database;
        private $conn;


        public function __construct($host, $username, $password, $database) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;

            $this->connect();
        }

        private function connect() {
            $conn = "mysql:host=$this->host;dbname=$this->database";
            try {
                $this->conn = new PDO($conn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        public function dbQuery($sql, $params = array()) {
            if ($sql) {
                try {
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute($params);
                    if (strpos(strtoupper($sql), 'SELECT') === 0) {
                        return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        return true;
                    }
                } catch(PDOException $e) {
                    error_log("Andmebaasi Viga: " . $e->getMessage());
                    return false;
                }
            }
        }
    }

    $conn = new MySQLPDO("127.0.0.1", "username", "password", "simple");
?>