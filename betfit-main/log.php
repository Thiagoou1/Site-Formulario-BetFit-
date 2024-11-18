<?php
// Parâmetros de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario-betfit";

try {
    // Cria a conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Define o modo de erro do PDO como exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtém os dados do formulário
    $loguin = $_POST['loguin'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar o cadastro usando prepared statement
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE loguin = :loguin AND senha = :senha");
    $stmt->bindParam(':loguin', $loguin);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Verifica se a consulta retornou algum resultado
    if ($stmt->rowCount() > 0) {
        // O usuário está cadastrado
        // Redirecionar para a área da conta ou exibir uma mensagem de sucesso
        header("Location: index.html");
        exit();
    } else {
        // O usuário não está cadastrado
        // Redirecionar para a área de cadastro ou exibir uma mensagem de erro
        header("Location: formulario.html");
        exit();
    }
} catch(PDOException $e) {
    // Em caso de erro na conexão ou consulta, exibe a mensagem de erro
    die("Falha na conexão: " . $e->getMessage());
}
?>