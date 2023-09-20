<?php
    session_start();

    if (!isset($_SESSION["CURRENT_user"]['id'])) {
        header('location:./');
        exit();
    }

    ?>