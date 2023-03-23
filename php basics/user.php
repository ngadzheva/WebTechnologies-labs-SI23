<?php
    class User {
        private $username;
        private $email;
        private $password;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function info() {
            return "$this->username: $this->email";
        }
    }
?>