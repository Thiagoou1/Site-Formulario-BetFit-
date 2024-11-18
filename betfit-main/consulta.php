<?php 
include("conexao.php");

// Verifica se o nome foi enviado pelo formulário
if (isset($_POST['nome'])) {
    // Obtém o nome fornecido pelo cliente
    $nome = $_POST['nome'];

    // Consulta SQL para selecionar os dados com base no nome
    $sql = "SELECT id, nome, endereco, nasc, nacionalidade, altura, peso, sexo, tipo_sanguineo, remedio_controlado_observacoes, lesoes_anteriores_observacoes, cirurgias_observacoes, email, cel, loguin, senha FROM usuarios WHERE nome LIKE :nome ORDER BY nome";
    
    // Prepara a consulta
    $stmt = $conn->prepare($sql);
    
    // Define o valor do parâmetro nome e adiciona os caracteres curinga (%)
    $param_nome = "%{$nome}%";
    $stmt->bindParam(':nome', $param_nome);
    
    // Executa a consulta
    $stmt->execute();

    // Verifica se a consulta retornou algum resultado
    if ($stmt->rowCount() > 0) {
        // Loop através dos resultados e exibe os dados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: " . $row['nome'] . "<br>";
            echo "Endereço: " . $row['endereco'] . "<br>";
            echo "Data de Nascimento: " . $row['nasc'] . "<br>";
            echo "Nacionalidade: " . $row['nacionalidade'] . "<br>";
            echo "Altura: " . $row['altura'] . "<br>";
            echo "Peso: " . $row['peso'] . "<br>";
            echo "Sexo: " . $row['sexo'] . "<br>";
            echo "Tipo Sanguíneo: " . $row['tipo_sanguineo'] . "<br>";
            echo "Observações Remédio Controlado: " . $row['remedio_controlado_observacoes'] . "<br>";
            echo "Observações Lesões Anteriores: " . $row['lesoes_anteriores_observacoes'] . "<br>";
            echo "Observações Cirurgias: " . $row['cirurgias_observacoes'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Celular: " . $row['cel'] . "<br>";
            echo "Login: " . $row['loguin'] . "<br>";
            echo "Senha: " . $row['senha'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Nenhum dado encontrado.";
    }
} else {
    // Exibe o formulário para inserir o nome
    ?>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <input type="submit" value="Consultar">
    </form>
    
    <?php
}


// Fechar a conexão com o banco de dados
$conn = null;
echo "<a href='editar.php'>Editar dados</a><br>"; // Exibe um link para editar os dados inseridos
echo "<a href='excluir.php'>Excluir dados</a>"; // Exibe um link para excluir os dados inseridos
echo "<br><a href='index.html'>Voltar ao Inicio</a>"; // Exibe um link para voltar para a pagina inicial

?>