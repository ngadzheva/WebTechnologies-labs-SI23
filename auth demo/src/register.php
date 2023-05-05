<?php
    require 'testInputUtility.php';
    require 'user.php';

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_data = json_decode($_POST['data'], true);

        $username = $user_data['userName'] ? testInput($user_data['userName']) : '';
        $password = $user_data['password'] ? testInput($user_data['password']) : '';
        $confirmPassword = $user_data['confirmPassword'] ? testInput($user_data['confirmPassword']) : '';
        $email = $user_data['email'] ? testInput($user_data['email']) : '';

        if (!$username) {
            $errors[] = 'Username must be provided';
        } else if (strlen($username) < 3) {
            $errors[] = 'Username must be at least 3 characters';
        }

        if (!$password) {
            $errors[] = 'Password must be provided';
        } else if (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters';
        }

        if (!$confirmPassword) {
            $errors[] = 'Confirm Password must be provided';
        } else if (strlen($confirmPassword) < 6) {
            $errors[] = 'Confirm Password must be at least 6 characters';
        }

        if ($username && $password && $confirmPassword && strlen($password) > 6 && strlen($confirmPassword) > 6) {
            if ($password !== $confirmPassword) {
                $errors[] = 'Confirm password must match password';
            } else {
                $user = new User($username, $password);
                $exists = $user->exists();

                if ($exists) {
                    $errors[] = 'Existing user';
                } else {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $result = $user->createUser($password_hash, $email);

                    if (!$result['success']) {
                        $errors[] = 'Internal server error';
                    }
                }
            }
        }

        if ($errors) {
            http_response_code(400);
            echo json_encode($errors);
        } else {
            echo json_encode(['message' => 'User created successfully']);
        }
    }
?>