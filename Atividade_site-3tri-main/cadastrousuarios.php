<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nome_banco = "memorycard";

$conexao = new mysqli($servidor, $usuario, $senha, $nome_banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

if (isset($_POST['cadastrar'])) {
    

    $nome = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);


    $sql = "INSERT INTO usuarios (Nome do Usuário, E-mail, Senha) VALUES ('$nome', '$email', '$senha')";
    
    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso! O novo ID é: " . $conexao->insert_id;
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
} else {

    echo "Acesso inválido. Por favor, use o formulário de cadastro.";
}

$conexao->close();
?>