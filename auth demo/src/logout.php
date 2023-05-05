<?php
    session_unset();
    session_destroy();

    setcookie('remember', '', time() - 60);
?>