<?php
    class User {
        function __construct($id, $name, $password, $email) {   
            $user = new User($id,
                           $name,
                       $password,
                          $email);
                          
            $this->user = $user;
        }

        private $id;
        private $name;
        private $email;
        private $password;
        private $permisson;


        function getId() {
            return $this->id;
        }
        function setId($id) {   
            $this->$id = $id;
        }

        function getName() {   
            return $this->name;
        }
        function setName($name) {
            $this->$name = $name;
        }

        function getEmail() {
            return $this->email;
        }
        function setEmail($email) {
            $this->$email = $email;
        }

        function getPassword() {
            return $this->password;
        }
        function setPassword($password) {
            $this->$password = $password;
        }

        function getPermisson() {
            return $this->permisson;
        }
        function setPermisson($permisson) {
            $this->$permisson = $permisson;
        }

        
    }
?>