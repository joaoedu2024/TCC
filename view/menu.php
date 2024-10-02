<?php
@session_start();
require_once(ROOT_PATH . 'model/conexao.php');

$id = $_SESSION['id_perfil'];
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    $login = $res[0]['login'];
}

$cons = $pdo->query("SELECT foto_perfil FROM perfil WHERE id = '$id'");
$resp = $cons->fetchAll(PDO::FETCH_ASSOC);

if ($total_reg > 0) {
   
    $foto_perfil = $resp[0]['foto_perfil'] ? $resp[0]['foto_perfil'] : 'user.png'; // Usa uma imagem padrão se não houver foto de perfil
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
    <link rel="stylesheet" type="text/css" href="/Marketplace/view/CSS/menu.css">
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
                <a href="criar-oferta">Crie sua Oferta</a>
                <a href="perfil">Perfil</a>
                <span><?php echo $login; ?></span>
            </div>
            <a href="/Marketplace/logout"><img src="/Marketplace/imagens/<?= $foto_perfil ?>" alt="User Avatar"></a>

        </div>
    </nav>

    <div id="ofertas-container">
    </div>

    <br><br><br>

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

    <script>
        function criarCardOferta(oferta) {
            const card = document.createElement('div');
            card.classList.add('oferta-card');
            card.innerHTML = `
                <div class="image">
                    <img src="/Marketplace/imagens/${oferta.nome_foto}" alt="Imagem da oferta">
                </div>
                <div class="info">
                    <h2>${oferta.nome}</h2>
                    <p class="description">${oferta.descricao}</p>
                    <div class="details">
                        <p> 
                        <span class="unavailable">${oferta.id_perfil}</span><br><br>
                        <span class="unavailable">${oferta.categoria}</span>
                        </p>
                    </div>
                    <a href="#" class="button">Fazer Solicitação</a>
                </div>
            `;

            document.getElementById('ofertas-container').appendChild(card);
        }

        fetch('/Marketplace/controller/alterar_usuario.php')
            .then(response => response.json())
            .then(ofertas => {
                console.log(ofertas);
                ofertas.forEach(oferta => {
                    criarCardOferta(oferta);
                });
            })
            .catch(error => console.error('Erro ao carregar ofertas:', error));
    </script>

</body>

</html>

<style>

</style>