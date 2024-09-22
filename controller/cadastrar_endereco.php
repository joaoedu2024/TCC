<?php
require_once("../model/conexao.php");
session_start();

$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$bairro = $_POST["bairro"];
$rua = $_POST["rua"];
$pais = $_POST["pais"];

$sql = "INSERT INTO endereco (cep, estado, cidade, bairro, rua, pais) VALUES (:cep, :estado, :cidade, :bairro, :rua, :pais);";
$ins = $pdo->prepare($sql);

if ($ins === false) {
    die('Prepare failed: ' . htmlspecialchars($pdo->errorInfo()[2]));
}

$ins->bindParam(':cep', $cep);
$ins->bindParam(':estado', $estado);
$ins->bindParam(':cidade', $cidade);
$ins->bindParam(':bairro', $bairro);
$ins->bindParam(':rua', $rua);
$ins->bindParam(':pais', $pais);

if ($ins->execute()) {
    $ultimoId = $pdo->lastInsertId();

    $up = "UPDATE perfil SET id_endereco = :id_endereco WHERE id = :id_perfil";
    $update = $pdo->prepare($up);
    $update->bindParam(':id_endereco', $ultimoId);
    $update->bindParam(':id_perfil', $_SESSION['id_perfil']);

    if ($update->execute()) {
        header("Location: /Marketplace/");
    } else {
        echo "Erro ao atualizar o perfil: " . implode(", ", $update->errorInfo());
    }
} else {
    echo "Erro ao cadastrar o endereço: " . implode(", ", $ins->errorInfo());
}
?>