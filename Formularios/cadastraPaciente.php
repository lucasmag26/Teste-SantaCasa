<?php

    include_once("conexao.php");

    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];

    $result = mysqli_query($conn, "INSERT INTO paciente (nome, cpf, dataNascimento) VALUES ('$nome','$cpf','$dataNascimento')");

    mysqli_close($conn);
    header('location:../index.php');
?>