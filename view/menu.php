<?php
@session_start();
require_once(ROOT_PATH . 'model/conexao.php');

$id = $_SESSION['id'];
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	$login = $res[0]['login'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel - Ampera</title>
	<link rel="stylesheet" type="text/css" href="/Marketplace/view/CSS/index.css">
</head>

<body>

	<nav>
		<div class="logo">
			<img src="/Marketplace/imagens/logo.png" alt="Ampera Logo">
		</div>
		<div class="user">
			<div class="menu">
				<a href="ofertas">Ofertas</a>
				<a href="sobre">Sobre</a>
				<a href="solicitacoes">Solicitações</a>
				<span><?php echo $login; ?></span>
			</div>
			<img src="../IMAGENS/user.png" alt="User Avatar">
	</nav>

	<!-- FOOTER -->
	<footer>
		<div class="social-icons">
			<a href="#"><img src="/Marketplace/imagens/instagram.png" alt="Instagram"></a>
			<a href="#"><img src="/Marketplace/imagens/facebook.png" alt="Facebook"></a>
			<a href="#"><img src="/Marketplace/imagens/twitter.png" alt="Twitter"></a>
			<a href="#"><img src="/Marketplace/imagens/whatsapp.png" alt="WhatsApp"></a>
		</div>
		<div class="copyright">
			<p>© 2024 Ampera</p>
		</div>
	</footer>
</body>

</html>