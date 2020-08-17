<?php

    class Database{
        private $serverName;
        private $userName;
        private $password;
        private $dataBaseName;

        protected function connect(){
            $this->serverName = 'localhost';
            $this->userName = 'root';
            $this->password = '';
            $this->dataBaseName = 'oop_php';

            $conn = new mysqli($this->serverName,$this->userName,$this->password,$this->dataBaseName);
            return $conn;
        }

    }
    
?>