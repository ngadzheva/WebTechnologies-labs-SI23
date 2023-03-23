<?php
    require_once 'user.php';

    class Student extends User {
       private $fn;
       private $marks;
       
       public function __construct($username, $email, $password, $fn, $marks) {
            parent::__construct($username, $email, $password);

            $this->fn = $fn;
            $this->marks = $marks;
       }

       public function info() {
            return "$this->fn, parent::info()";
       }
    }
?>