<?php
    class User {
        public function __construct($id, $name, $password, $email, $permisson, $status) {   
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->email = $email;
            $this->permisson = $permisson;
            $this->status = 1;
        }

        private $id;
        private $name;
        private $email;
        private $password;
        private $permisson;
        private $status;

        public function getId() {
            return $this->id;
        }
        public function setId($id) {   
            $this->$id = $id;
        }

        public function getName() {   
            return $this->name;
        }
        public function setName($name) {
            $this->$name = $name;
        }

        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->$email = $email;
        }

        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
            $this->$password = $password;
        }

        public function getPermisson() {
            return $this->permisson;
        }
        public function setPermisson($permisson) {
            $this->$permisson = $permisson;
        }

        public function getStatus() {
            return $this->status;
        }
        public function setStatus($status) {
            $this->$status = $status;
        }
        
    }
?>