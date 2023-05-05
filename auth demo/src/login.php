<?php
    require 'testInputUtility.php';
    require 'tokenUtility.php';
    require 'user.php';

    session_start();

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_data = json_decode($_POST['data'], true);

        $username = $user_data['userName'] ? testInput($user_data['userName']) : '';
        $password = $user_data['password'] ? testInput($user_data['password']) : '';
        $remember = $user_data['remember'] ? $user_data['remember'] : false;

        if (!$username || !$password) {
            $errors[] = 'Username and passwords are required';
        } else {
            $user = new User($username, $password);
            $exists = $user->exists();

            if (!$exists) {
                $errors[] = 'Username or password is invalid';
            } else {
                $is_valid = $user->isValid($password);

                if ($is_valid["success"]) {
                    $_SESSION['username'] = $username;
                    $_SESSION['userId'] = $is_valid['data']['id'];

                    if ($remember) {
                        $token = bin2hex(random_bytes(8));
                        $expiration_date = time() + 30 * 24 * 60 * 60;
                        $token_utility = new TokenUtility();
                        $token_utility->createToken($token, $_SESSION['userId'], $expiration_date);
                        setcookie('remember', $token, $expiration_date, '/');
                    }
                } else {
                    $errors[] = 'Username or password is invalid';
                }
            }
        }
    }

    if ($errors) {
        http_response_code(401);

        echo json_encode($errors);
    } else {
        echo json_encode('User logged in');
    }
?>