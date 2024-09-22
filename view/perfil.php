<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: /login");
        exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="CSS/perfil.css">
</head>

<body>

    <div class="container">
        <div class="section profile-image-section">
            <img id="profileImage" src="../IMAGENS/user.png" alt="Imagem do Perfil">
            <div class="profile-actions">
                <button class="atualizar" onclick="triggerUpload()">Atualizar imagem de perfil</button>
                <input type="file" id="uploadImage" accept="image/*" style="display: none;" onchange="previewImage(event)">
                <p>A imagem deve estar em JPEG ou PNG, e não pode ter mais de 10 MB.</p>
            </div>
        </div>

        <div class="section">
            <h2>Localização</h2>

            <label for="cep">CEP</label>
            <input type="text" id="cep" name="cep">
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade">
            <label for="bairro">Bairro</label>
            <input type="text" id="bairro" name="bairro">
            <label for="rua">Rua</label>
            <input type="text" id="rua" name="rua">
            <label for="pais">País</label>
            <input type="text" id="pais" name="pais">
        </div>

        <div class="section">
            <h2>Configurações de perfil</h2>
            <p>Alterar detalhes de identificação da sua conta</p>
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha">
            <label for="contato">Contato</label>
            <input type="text" id="contato" name="contato">
            <label for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" id="cpf_cnpj" name="cpf_cnpj">
            <button class="save-changes" onclick="saveChanges()">Salvar alterações</button>
        </div>
    </div>

    <script>
        /* Função para salvar as mudanças */
        function saveChanges() {
            const usuario = document.getElementById("usuario").value;
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;
            const contato = document.getElementById("contato").value;
            const cpf_cnpj = document.getElementById("cpf_cnpj").value;
            const cep = document.getElementById("cep").value;
            const estado = document.getElementById("estado").value;
            const cidade = document.getElementById("cidade").value;
            const bairro = document.getElementById("bairro").value;
            const rua = document.getElementById("rua").value;
            const pais = document.getElementById("pais").value;

            /* Salvando os valores no localStorage */
            localStorage.setItem('usuario', usuario);
            localStorage.setItem('email', email);
            localStorage.setItem('senha', senha);
            localStorage.setItem('contato', contato);
            localStorage.setItem('cpf_cnpj', cpf_cnpj);
            localStorage.setItem('cep', cep);
            localStorage.setItem('estado', estado);
            localStorage.setItem('cidade', cidade);
            localStorage.setItem('bairro', bairro);
            localStorage.setItem('rua', rua);
            localStorage.setItem('pais', pais);

            alert("Alterações salvas com sucesso!");
        }

        function loadSavedData() {
            if (localStorage.getItem('profileImage')) {
                document.getElementById('profileImage').src = localStorage.getItem('profileImage');
            }
            if (localStorage.getItem('usuario')) {
                document.getElementById('usuario').value = localStorage.getItem('usuario');
            }
            if (localStorage.getItem('email')) {
                document.getElementById('email').value = localStorage.getItem('email');
            }
            if (localStorage.getItem('senha')) {
                document.getElementById('senha').value = localStorage.getItem('senha');
            }
            if (localStorage.getItem('contato')) {
                document.getElementById('contato').value = localStorage.getItem('contato');
            }
            if (localStorage.getItem('cpf_cnpj')) {
                document.getElementById('cpf_cnpj').value = localStorage.getItem('cpf_cnpj');
            }
            if (localStorage.getItem('cep')) {
                document.getElementById('cep').value = localStorage.getItem('cep');
            }
            if (localStorage.getItem('estado')) {
                document.getElementById('estado').value = localStorage.getItem('estado');
            }
            if (localStorage.getItem('cidade')) {
                document.getElementById('cidade').value = localStorage.getItem('cidade');
            }
            if (localStorage.getItem('bairro')) {
                document.getElementById('bairro').value = localStorage.getItem('bairro');
            }
            if (localStorage.getItem('rua')) {
                document.getElementById('rua').value = localStorage.getItem('rua');
            }
            if (localStorage.getItem('pais')) {
                document.getElementById('pais').value = localStorage.getItem('pais');
            }
        }

        /* Carregar dados salvos ao carregar a página */
        window.onload = loadSavedData;
    </script>

</body>

</html>