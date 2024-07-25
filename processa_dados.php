    <?php



function recebe_dados($nome_Diretorio_Img = '/public/'){
    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
        // Captura os valores dos campos do formulário
        $nome = $_POST['nome-form'];

        $nome_Diretorio = 'public/'.$nome;
        mkdir($nome_Diretorio); 

        $nomeArquivo = "teste";
        // Aqui você pode adicionar código para manipular o arquivo enviado (imagem)
        if ($_FILES['img-form']['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = $_FILES['img-form']['name'];
            move_uploaded_file($_FILES['img-form']['tmp_name'], "./public/$nome/$nomeArquivo");
            //echo "<p>Imagem enviada com sucesso: $nomeArquivo</p>";
        };
       

        // Coleta dos dados do formulário
       $dados_formulario = array(
        'nome' => $_POST['nome-form'],
        'nomeImg' => $nomeArquivo,
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
      

        //Copia o arquivo modelo.html
        $pagHtmlModelo = file_get_contents("public/modelo.html"); // Lê o conteúdo do arquivo

        touch("public/$nome/$nome".'.html');
        file_put_contents("public/$nome/$nome".'.html', $pagHtmlModelo);

        return $dados_formulario;

    } else {
        // Caso não seja uma requisição POST, redireciona para página de erro ou outra página
        echo "<h2>Erro: Método de requisição inválido.</h2>";
    }
};

$dados_form = recebe_dados();


function enviarDados($dados){
    $dados = recebe_dados();

    // Define o cabeçalho Content-Type como JSON
    header('Content-Type: application/json');   

    $dadosJson = json_encode($dados);

    // Redireciona para a página teste.html após um pequeno delay (opcional)
    $url = "https://sitqowi.sao.dom.my.id/public/" . $dados['nome'] . "/" . $dados['nome'] . ".html";

    /*header("Location: $url?dados=$dadosJson");*/

};

function addNomePagNoRegristo($nome){
    $arquivo = fopen("public/name_pages.txt", "a");
    fwrite($arquivo, "\n $nome");
    fclose($arquivo);
}


function principal(){
    $dados = recebe_dados();
    addNomePagNoRegristo($dados['nome']);
    enviarDados($dados);
};




principal();

?>
