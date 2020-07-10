<?php
require_once __DIR__ . '/../App/Db.php';
unset($_SESSION['logged_user']);
header('Location: /');