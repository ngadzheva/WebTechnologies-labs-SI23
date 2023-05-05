<?php
    require 'tokenUtility.php';

    session_start();
    
    if (isset($_SESSION['username'])) {
        echo json_encode('User authorized with session');
    } else {
        if (isset($_COOKIE['remember'])) {
            $token_utility = new TokenUtility();
            $is_valid = $token_utility->checkToken($_COOKIE['remember']);

            if ($is_valid['success']) {
                echo json_encode('User authorized with cookie');
            } else {
                http_response_code(401);

                echo json_encode($is_valid['message']);
            }
        } else {
            http_response_code(401);

            echo json_encode('User not authorized');
        }
    }
?>