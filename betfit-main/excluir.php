<?php
include("conexao.php");

// Verifica se o nome foi enviado pelo formulário
if (isset($_POST['nome'])) {
    // Obtém o nome fornecido pelo cliente
    $nome = $_POST['nome'];

    // Consulta SQL para excluir o registro com base no nome
    $sql = "DELETE FROM usuarios WHERE nome = :nome";
    
    // Prepara a consulta
    $stmt = $conn->prepare($sql);
    
    // Define o valor do parâmetro nome
    $stmt->bindParam(':nome', $nome);
    
    // Executa a consulta
    $stmt->execute();

    // Verifica se o registro foi excluído com sucesso
    if ($stmt->rowCount() > 0) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Falha ao excluir o registro.";
    }
} else {
    // Exibe o formulário para inserir o nome
    ?>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <input type="submit" value="Excluir">
    </form>
    <?php
}
echo "<br><a href='index.html'>Voltar ao Inicio</a>"; // Exibe um link para voltar para a pagina inicial

// Fechar a conexão com o banco de dados
$conn = null;
?>