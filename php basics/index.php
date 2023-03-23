<?php
    require_once 'user.php';
    require_once 'student.php';

    $user = new User("ivgerves", "ivgerves@gmail.com", "jdkjgdgkdjgldf");
    $user->info();

    $student = new Student("ivgerves", "ivgerves@gmail.com", "jdkjgdgkdjgldf", 66666, [5, 5, 6])
    $student->info();
    $student->studentInfo();
?>