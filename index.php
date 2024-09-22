<?php
session_start();

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Marketplace/');

// Se o usuário não estiver logado, redireciona para a página de login
if (!isset($_SESSION['id'])) {
    header("Location: /login");
    exit();
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'login':
            include 'view/login.php';
            break;
        case 'menu':
            include 'view/menu.php';
            break;
        case 'cadastro':
            include 'view/cadastro.php';
            break;
        case 'cadastro1':
            // Verifica se o cadastro inicial foi feito antes de carregar o cadastro1
            if (isset($_SESSION['cadastro_completo'])) {
                include 'view/cadastro1.php';
            } else {
                header("Location: cadastro"); // Redireciona para o primeiro cadastro
                exit();
            }
            break;
        case 'perfil':
            include 'view/perfil.php';
            break;
        case 'criar-oferta':
            include 'view/criar_oferta.php';
            break;
    }
} else {
    include 'view/login.php'; // Padrão, página de login
}
