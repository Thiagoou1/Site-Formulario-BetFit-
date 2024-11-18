<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=formulario-betfit", $username, $password);
  // Msg de sucesso ou erro
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexão efetuada com sucesso!  <br><br><br>";
} catch(PDOException $e) {
  echo "Conexão falhou!: <br>" . $e->getMessage();
}
?>