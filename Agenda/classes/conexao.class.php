<?php // database connection factory
    class Connection {
        private $user;
        private $password;
        private $database;
        private $server;
        private static $pdo;

        public function __construct() {
            $this->server   = "localhost";
            $this->database = "agenda4a";
            $this->user     = "root";
            $this->password = "";
        }

        public function connect() {
            try { // verify if there is problems in the connection
                if(is_null(self::pdo)){
                    self::$pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->database, $this->user, $this->password);
                }
                return self::$pdo;

            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }