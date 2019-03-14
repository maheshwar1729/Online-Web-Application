<?php
    class db{
        // Properties
        private $dbhost = 'x.x.x.8';
        private $dbuser = 'vm_www';
        private $dbpass = '';
        private $dbname = 'mach';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }
