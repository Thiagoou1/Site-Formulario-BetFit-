<?php 
include("conexao.php");

if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];

    // Consulta SQL para selecionar os dados com base no nome
    $sql = "SELECT id, nome, endereco, nasc, nacionalidade, altura, peso, sexo, tipo_sanguineo, remedio_controlado_observacoes, lesoes_anteriores_observacoes, cirurgias_observacoes, email, cel, loguin, senha FROM usuarios WHERE nome = :nome";
    
    // Prepara a consulta
    $stmt = $conn->prepare($sql);
    
    // Define o valor do parâmetro nome
    $stmt->bindParam(':nome', $nome);
    
    // Executa a consulta
    $stmt->execute();

    // Verifica se a consulta retornou algum resultado
    if ($stmt->rowCount() > 0) {
        // Loop através dos resultados e exibe os dados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="nome"><br>Nome:</label>
                <input type="text" name="nome" value="<?php echo $row['nome']; ?>">
                <label for="endereco"><br>Endereço:</label>
                <input type="text" name="endereco" value="<?php echo $row['endereco']; ?>">
                <label for="nasc"><br>Data de Nascimento:</label>
                <input type="text" name="nasc" value="<?php echo $row['nasc']; ?>">
                <label for="nacionalidade"><br>Nacionalidade:</label>
                <input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade']; ?>">
                <label for="altura"><br>Altura:</label>
                <input type="text" name="altura" value="<?php echo $row['altura']; ?>">
                <label for="peso"><br>Peso:</label>
                <input type="text" name="peso" value="<?php echo $row['peso']; ?>">
                <label for="sexo"><br>Sexo:</label>
                <input type="text" name="sexo" value="<?php echo $row['sexo']; ?>">
                <label for="tipo_sanguineo"><br>Tipo Sanguíneo:</label>
                <input type="text" name="tipo_sanguineo" value="<?php echo $row['tipo_sanguineo']; ?>">
                <label for="remedio_controlado_observacoes"><br>Observações Remédio Controlado:</label>
                <input type="text" name="remedio_controlado_observacoes" value="<?php echo $row['remedio_controlado_observacoes']; ?>">
                <label for="lesoes_anteriores_observacoes"><br>Observações Lesões Anteriores:</label>
                <input type="text" name="lesoes_anteriores_observacoes" value="<?php echo $row['lesoes_anteriores_observacoes']; ?>">
                <label for="cirurgias_observacoes"><br>Observações Cirurgias:</label>
                <input type="text" name="cirurgias_observacoes" value="<?php echo $row['cirurgias_observacoes']; ?>">
                <label for="email"><br>Email:</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>">
                <label for="cel"><br>Celular:</label>
                <input type="text" name="cel" value="<?php echo $row['cel']; ?>">
                <label for="loguin"><br>Login:</label>
                <input type="text" name="loguin" value="<?php echo $row['loguin']; ?>">
                <label for="senha"><br>Senha:<b</label>
                <input type="password" name="senha" value="<?php echo $row['senha']; ?>">

                <input type="submit" name="salvar" value="Salvar">
            </form>
            <?php
        }
    } else {
        echo "Nenhum dado encontrado.";
    }
} elseif (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $nasc = $_POST['nasc'];
    $nacionalidade = $_POST['nacionalidade'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $sexo = $_POST['sexo'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $remedio_controlado_observacoes = $_POST['remedio_controlado_observacoes'];
    $lesoes_anteriores_observacoes = $_POST['lesoes_anteriores_observacoes'];
    $cirurgias_observacoes = $_POST['cirurgias_observacoes'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];
    $loguin = $_POST['loguin'];
    $senha = $_POST['senha'];

    // Consulta SQL para atualizar os dados com base no ID
    $sql = "UPDATE usuarios SET nome = :nome, endereco = :endereco, nasc = :nasc, nacionalidade = :nacionalidade, altura = :altura, peso = :peso, sexo = :sexo, tipo_sanguineo = :tipo_sanguineo, remedio_controlado_observacoes = :remedio_controlado_observacoes, lesoes_anteriores_observacoes = :lesoes_anteriores_observacoes, cirurgias_observacoes = :cirurgias_observacoes, email = :email, cel = :cel, loguin = :loguin, senha = :senha WHERE id = :id";
    
    // Prepara a consulta
    $stmt = $conn->prepare($sql);
    
    // Define os valores dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':nasc', $nasc);
    $stmt->bindParam(':nacionalidade', $nacionalidade);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':tipo_sanguineo', $tipo_sanguineo);
    $stmt->bindParam(':remedio_controlado_observacoes', $remedio_controlado_observacoes);
    $stmt->bindParam(':lesoes_anteriores_observacoes', $lesoes_anteriores_observacoes);
    $stmt->bindParam(':cirurgias_observacoes', $cirurgias_observacoes);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cel', $cel);
    $stmt->bindParam(':loguin', $loguin);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $id);
    
    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados.";
    }
} else {
    // Exibe o formulário para inserir o nome
    ?>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <input type="submit" name="atualizar" value="Atualizar">
    </form>
    <?php
}
echo "<br><a href='excluir.php'>Excluir dados</a>"; // Exibe um link para excluir os dados inseridos
echo "<br><a href='index.html'>Voltar ao Inicio</a>"; // Exibe um link para voltar para a pagina inicial



// Fechar a conexão com o banco de dados
$conn = null;
?>