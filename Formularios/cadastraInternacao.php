<?php

    include_once("conexao.php");

    $pacienteId = $_POST['paciente'];
    $dataIni = $_POST['dataIni'];
    $dataFin = $_POST['dataFin'];
    $desCirurgia = $_POST['desCirurgia'];

    $sql = "INSERT INTO internacao (pacienteId, dataIni, dataFin, desCirurgia) VALUES ( '$pacienteId', '$dataIni','$dataFin','$desCirurgia')";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    header('location:../index.php');
?>