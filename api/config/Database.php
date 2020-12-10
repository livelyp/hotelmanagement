<?php
    class Database {
        /* 
            set the host, database, username, and password in one file
            if any change only one file will need to be changed
        */
        private $host = 'localhost';
        private $db_name = 'cpsc471-hms';
        private $username = 'root';
        private $password = '';
        private $conn;

        // function to connect to the database
        public function connect() {
            // create a connection
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

            // Output error if connection fails
            if(!($this->conn)){
                die("Connection failed: " . mysqli_connect_error());
            }
            return $this->conn;
        }
    }
?>
