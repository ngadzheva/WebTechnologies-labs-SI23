<?php
    $type = 'mysql';
    $host = 'localhost';
    $dbname = 'web-tech-23';
    $user = 'root';
    $password = '';

    try {
        $connection = new PDO("$type:host=$host;dbname=$dbname", $user, $password);

        // $sql = 'CREATE TABLE students (
        //     fn INT(8) NOT NULL,
        //     firstName VARCHAR(50) NOT NULL,
        //     lastName VARCHAR(50) NOT NULL,
        //     userid INT NOT NULL,
        //     mark INT(1),
        //     PRIMARY KEY (fn),
        //     FOREIGN KEY (userid) REFERENCES users (id)
        // )';

        // $connection->query($sql);

        $sql = 'INSERT INTO students (fn, firstName, lastName, userid) VALUES (666666, "Student", "Name", 1)';
        // $connection->query($sql);

        // $sql = "INSERT INTO users (username, password) VALUES ('?', '?')";
        // $users_prepared = $connection->prepare($sql);

        // $users_prepared->execute(['user1', 'dsfkhdjfhjdhgj']);
        // $users_prepared->execute(['user2', 'fjdlgjkfdgjdfgl']);   
        
        $users_prepared = $connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        // $stmt->execute(['user1', 'dsfkhdjfhjdhgj']);

        $sql = "INSERT INTO students (fn, firstName, lastName, userid) VALUES (:fn, :firstName, :lastName, :userid)";
        $students_prepared = $connection->prepare($sql);

        // $students_prepared->execute(["fn" => 66666898, "firstName" => 'Name', "lastName" => "ddjsf", "userid" => 1]);

        $sql = 'SELECT * FROM students';
        $result = $connection->query($sql);

        // $all_students = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($all_students);

        echo "<br/>";

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo $row['fn'] . ': ' . $row['firstName'] . ' ' . $row['lastName'];
            echo "<br/>";
        }

        $users = [
            ["username" => 'user1', "password" => 'djaskjfkdasf'],
            ["username" => 'user2', "password" => 'dsakfldsjfdslfkds'],
            ["username" => 'user3', "password" => 'sdkfldsklfksdl;fjds']
        ];

        $students = [
            ["fn" => 66668, "firstName" => 'Name', "lastName" => "ddjsf", "userid" => 1],
            ["fn" => 6666688, "firstName" => 'Name', "lastName" => "ddjsf", "userid" => 2],
            ["fn" => 6666689, "firstName" => 'Name', "lastName" => "ddjsf", "userid" => 3]
        ];

        $connection->beginTransaction();

        foreach($users as $user) {
            $users_prepared->execute($user);
        }

        // foreach($students as $student) {
        //     $students_prepared->execute($student);
        // }

        $connection->commit();
    } catch (Exception $e) {
        $connection->rollback();
        echo $e;
    }
?>