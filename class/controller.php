<?php
    class Controller {
        public $host                = 'localhost';
        public $database_username   = 'root';
        public $database_password   = '';
        public $database_name       = 'dbcrud';
        public $db;
        
        function __construct() {
            $this->connection();
        }

        private function connection() {
            $this->db = new mysqli($this->host, $this->database_username, $this->database_password, $this->database_name);
            if($this->db->connect_error) {
                echo 'Could not connect to the database.';
            }
        }
    }
?>