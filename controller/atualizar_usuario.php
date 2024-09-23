<?php
session_start();
require_once("../model/conexao.php");

if (!isset($_SESSION['id_perfil'])) {
    die("Usuário não está logado. Faça o login novamente.");
}

$id_usuarios = $_SESSION['id_perfil'];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $pais = $_POST['pais'];

    $sql_perfil = "UPDATE perfil SET nome = :nome, email = :email, contato = :contato, cpf_cnpj = :cpf_cnpj WHERE id_usuarios = :id_usuarios";
    $stmt = $pdo->prepare($sql_perfil);
    $stmt->bindParam(':nome', $usuario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contato', $contato);
    $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
    $stmt->bindParam(':id_usuarios', $id_usuarios);

    $sql_endereco = "UPDATE endereco SET cep = :cep, estado = :estado, cidade = :cidade, bairro = :bairro, rua = :rua, pais = :pais WHERE id = (SELECT id_endereco FROM perfil WHERE id_usuarios = :id_usuarios)";
    $stmt2 = $pdo->prepare($sql_endereco);
    $stmt2->bindParam(':cep', $cep);
    $stmt2->bindParam(':estado', $estado);
    $stmt2->bindParam(':cidade', $cidade);
    $stmt2->bindParam(':bairro', $bairro);
    $stmt2->bindParam(':rua', $rua);
    $stmt2->bindParam(':pais', $pais);
    $stmt2->bindParam(':id_usuarios', $id_usuarios);

    if ($stmt->execute() && $stmt2->execute()) {
        $_SESSION['mensagem'] = "Informações atualizadas com sucesso!";
        header('Location: ../perfil');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar as informações.";
        exit;
    }

    
}
