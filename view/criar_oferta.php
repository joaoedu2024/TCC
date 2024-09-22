
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ampera - Criar Oferta</title>
    <link rel="stylesheet" href="/Marketplace/view/CSS/criar_oferta.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <br><br><br><br>
    <div class="negrito">
        <div class="container">
            <div class="section">
                <h2>Detalhes</h2>
                <form action="../controller/cadastrar_ofertas.php" method="POST">
                    <input type="text" name="nome" placeholder="Nome da sua Oferta">
                    <textarea name="produto" placeholder="Produto"></textarea>
                    <textarea name="descricao" placeholder="Descrição/Quantidade"></textarea>
                    <br>
                    Status:
                    <select name="status">
                        <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                    </select>
            </div>
                <div class="section">
                    <h2>Foto</h2>
                    <div class="upload-box">
                        <p>Fazer upload de miniatura</p>
                        <button><input type="file" name="nome_foto" accept="image/*" required></button>
                        <p>ou arraste os arquivos até aqui</p>
                    </div>
                    <div class="contato">
                        <h2>Contato</h2>
                        <input type="text" name="contato" id="contato" placeholder="Contato">
                        <input type="email" name="email" placeholder="E-mail">
                        <button class="create-offer" type="submit">Criar oferta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#contato').mask('(00) 00000-0000');
        });
        
    </script>
</body>

</html>