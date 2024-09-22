<?php
require_once("../model/conexao.php");
session_start();

$id_perfil =    $_SESSION['id_perfil'];
var_dump($id_perfil);
$nome =         $_POST["nome"];
$descricao =    $_POST["descricao"];
$contato =     $_POST["contato"];
$email =        $_POST["email"];
$status =       $_POST["status"];
$nome_foto =    $_POST["nome_foto"];

$sql = "INSERT INTO ofertas (nome, descricao, contato, email, status, nome_foto, id_perfil) VALUES (:nome, :descricao, :contato, :email, :status, :nome_foto, :id_perfil);";

$ins = $pdo->prepare($sql);
if ($ins === false ) {
    die('Prepare failed: ' . htmlspecialchars($pdo->errorInfo()[2]));
}

$ins->bindParam(':nome'     ,$nome);
$ins->bindParam(':descricao',$descricao);
$ins->bindParam(':contato' ,$contato);
$ins->bindParam(':email'    ,$email);
$ins->bindParam(':status'   ,$status);
$ins->bindParam(':nome_foto',$nome_foto);
$ins->bindParam(':id_perfil',$id_perfil);

    if ($ins->execute()) {

    $ultimoId = $pdo->lastInsertId();
    $up = "UPDATE ofertas SET id_perfil = $ultimoId WHERE id = {$_SESSION['id_perfil']}; ";
    $pdo->exec($up); 
    header("Location: menu");
} else {
    echo "Erro: " . implode(", ", $ins->errorInfo());
}
?>