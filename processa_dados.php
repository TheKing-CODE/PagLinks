<?php

function recebe_dados($nome_Diretorio_Img = '/public/'){
    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
        // Captura os valores dos campos do formulário
        $nome = $_POST['nome-form'];
        $descricao = $_POST['descricao-form'];
        $corFundo = $_POST['color-form'];
        $nomeButton1 = $_POST['name-button1'];
        $linkButton1 = $_POST['link-button1'];
        $nomeButton2 = $_POST['name-button2'];
        $linkButton2 = $_POST['link-button2'];
        $nomeButton3 = $_POST['name-button3'];
        $linkButton3 = $_POST['link-button3'];


        // Processamento adicional (salvar em banco de dados, enviar por email, etc.)
        // Exemplo simples de saída dos dados recebidos:
       /* echo "<h2>Dados Recebidos do Formulário:</h2>";
        echo "<p>Nome: $nome</p>";
        echo "<p>Descrição: $descricao</p>";
        echo "<p>Cor de Fundo (HEX): $corFundo</p>";
        echo "<p>Botão 1 - Nome: $nomeButton1, Link: $linkButton1</p>";
        echo "<p>Botão 2 - Nome: $nomeButton2, Link: $linkButton2</p>";
        echo "<p>Botão 3 - Nome: $nomeButton3, Link: $linkButton3</p>"; */       
        
        // Aqui você pode adicionar código para manipular o arquivo enviado (imagem)
        if ($_FILES['img-form']['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = $_FILES['img-form']['name'];
            move_uploaded_file($_FILES['img-form']['tmp_name'], "./public/$nomeArquivo");
            echo "<p>Imagem enviada com sucesso: $nomeArquivo</p>";
        };



       
        $dados_formulario = array(
            'nome' => $_POST['nome-form'],
            'descricao' => $_POST['descricao-form'],
            'corFundo' => $_POST['color-form'],
            'button1' => array(
                'nome' => $_POST['name-button1'],
                'link' => $_POST['link-button1']
            ),
            'button2' => array(
                'nome' => $_POST['name-button2'],
                'link' => $_POST['link-button2']
            ),
            'button3' => array(
                'nome' => $_POST['name-button3'],
                'link' => $_POST['link-button3']
            )
        );

        return $dados_formulario;

    } else {
        // Caso não seja uma requisição POST, redireciona para página de erro ou outra página
        echo "<h2>Erro: Método de requisição inválido.</h2>";
    }


}


function gerarHash($nome){
    return md5($nome);
}


function criarDiretorio($dados) {
    $dados_ = $dados;
    $nome_Diretorio = 'public/'.gerarHash($dados['nome']);
    mkdir($nome_Diretorio);
    return $nome_Diretorio;
}


function principal(){
    
}

principal();

?>
