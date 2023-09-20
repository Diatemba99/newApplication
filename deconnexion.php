<?php
session_start();
$_SESSION['idPersonne'] = '';
session_destroy();
header('location:./');
?>