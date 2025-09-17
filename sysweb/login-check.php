<?php

require_once 'config/database.php';
session_start();

$username = mysqli_real_escape_string($mysqli, stripcslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripcslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) || !ctype_alnum($password)) {
    header("Location: index.php?alert=1");
     exit();
} else {
    $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE username='$username' AND password='$password' AND status='Activo'")
        or die('Error query: ' . mysqli_error($mysqli));
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {
        $data = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['name_user'] = $data['name_user'];
        $_SESSION['permisos_acceso'] = $data['permisos_acceso'];
        
        header("Location: main.php?module=start"); 
        exit;
       
    } else {
        header("Location: index.php?alert=1");
        exit(); 
    }
}