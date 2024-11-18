<?php 
include("conexao.php");

$nome = $_POST['nome']; // Recebe o valor do campo "nome" do formulário enviado via POST
$endereco = $_POST['endereco']; // Recebe o valor do campo "endereco" do formulário enviado via POST
$nasc = $_POST['nasc']; // Recebe o valor do campo "nasc" do formulário enviado via POST
$nacionalidade = $_POST['nacionalidade']; // Recebe o valor do campo "nacionalidade" do formulário enviado via POST
$altura = $_POST['altura']; // Recebe o valor do campo "altura" do formulário enviado via POST
$peso = $_POST['peso']; // Recebe o valor do campo "peso" do formulário enviado via POST
$sexo = $_POST['sexo']; // Recebe o valor do campo "sexo" do formulário enviado via POST
$tipo_sanguineo = $_POST['tipo_sanguineo']; // Recebe o valor do campo "tipo_sanguineo" do formulário enviado via POST
$remedio_controlado_observacoes = $_POST['remedio_controlado_observacoes']; // Recebe o valor do campo "remedio_controlado_observacoes" do formulário enviado via POST
$lesoes_anteriores_observacoes = $_POST['lesoes_anteriores_observacoes']; // Recebe o valor do campo "lesoes_anteriores_observacoes" do formulário enviado via POST
$cirurgias_observacoes = $_POST['cirurgias_observacoes']; // Recebe o valor do campo "cirurgias_observacoes" do formulário enviado via POST
$email = $_POST['email']; // Recebe o valor do campo "email" do formulário enviado via POST
$cel = $_POST['cel']; // Recebe o valor do campo "cel" do formulário enviado via POST
$loguin = $_POST['loguin']; // Recebe o valor do campo "loguin" do formulário enviado via POST
$senha = $_POST['senha']; // Recebe o valor do campo "senha" do formulário enviado via POST

$sql = "INSERT INTO usuarios (nome, endereco, nasc, nacionalidade, altura, peso, sexo, tipo_sanguineo, remedio_controlado_observacoes, lesoes_anteriores_observacoes, cirurgias_observacoes, email, cel, loguin, senha) 
        VALUES ('$nome', '$endereco', '$nasc', '$nacionalidade', $altura, $peso, '$sexo', '$tipo_sanguineo', '$remedio_controlado_observacoes', '$lesoes_anteriores_observacoes', '$cirurgias_observacoes', '$email', '$cel', '$loguin', '$senha')";

$resultado_usuario = $conn->exec($sql); // Executa a consulta SQL para inserir os dados na tabela "usuarios"

echo "<p> $resultado_usuario registro foi incluído</p>"; // Exibe a mensagem informando o número de registros incluídos
echo "<a href='consulta.php'>Consultar dados <br></a>"; // Exibe um link para consultar os dados inseridos
echo "<a href='editar.php'>Editar dados</a>"; // Exibe um link para editar os dados inseridos
echo "<br><a href='excluir.php'>Excluir dados</a>"; // Exibe um link para excluir os dados inseridos
echo "<br><a href='index.html'>Voltar ao Inicio</a>"; // Exibe um link para voltar para a pagina inicial

?>