<?php
    include_once("conexao.php");
?>

<!DOCTYPE html >
<meta charset="utf-8"> 
<!-- Bootstrap CSS -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--BOOTSTRAP JAVASCRIPT-->  
<script src="../bootstrap/js/bootstrap.min.js"></script> 

<html>
    <head>
        <title>Santa Casa </title>
    </head>
    <body> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="paciente.php">Cadastrar Paciente <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="internacao.php">Cadastrar Internação  <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="exibeInternacao.php">Consulta Internação  <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    <div>
        
            <table class="table table-dark " style=" width: 55%; position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);"> 
                <h3 style="font-size: 20px;  position: absolute;  top: 13%; left: 25%;">Internações</h3>
                <thead>
                    <tr>
                    <th scope="col">Cirurgia</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Permanencia/Dias</th>
                    <th scope="col">Data Inicio</th>
                    <th scope="col">Data Fim</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $result_internacao = "SELECT  inte.desCirurgia,  DATE_FORMAT(inte.dataIni, '%d/%m/%Y') as dataIni , DATE_FORMAT(inte.datafin, '%d/%m/%Y') as dataFin, datediff( inte.dataFin, inte.dataIni ) AS permanencia, pac.nome, pac.cpf, floor( datediff(sysDate(), pac.dataNascimento)/360) AS idade
                                                    FROM internacao AS inte
                                                    JOIN paciente AS pac ON pac.pacienteId = inte.pacienteId
                                                    ORDER BY inte.dataIni ASC, pac.nome ASC";

                            $resultado_internacao = mysqli_query($conn, $result_internacao);
                            
                
                            while($rows_internacao = mysqli_fetch_assoc($resultado_internacao)){ ?>
								<tr>
                                    <td><?php echo $rows_internacao['desCirurgia']; ?></td>
									<td><?php echo $rows_internacao['nome']; ?></td>
                                    <td><?php echo $rows_internacao['cpf']; ?></td>
                                    <td><?php echo $rows_internacao['idade']; ?></td>
                                    <td><?php echo $rows_internacao['permanencia']; ?></td>
                                    <td><?php echo $rows_internacao['dataIni']; ?></td>
                                    <td><?php echo $rows_internacao['dataFin']; ?></td>

								</tr>
							<?php } ?>

                </tbody>
            </table>
        </div>
        <h3 style="font-size: 20px;  position: absolute;  top: 57%; left: 25%;">Permanencias</h3>
        <div style="  width: 50%; position: absolute; top: 75%; left: 50%; ">
            <table class="table table-dark " style=" position: absolute; top: 35%;  transform: translate(-50%, -50%);"> 
                <thead>
                    <tr>
                    <th scope="col">Periodo</th>
                    <th scope="col">Quantidade/Mes</th>
                    <th scope="col">Permanencia Total/Dias</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $result_internacaoMes = "SELECT COUNT((EXTRACT( YEAR_MONTH FROM inte.dataIni))) AS quantidade ,  DATE_FORMAT(inte.dataIni, '%m/%Y') AS periodo, SUM(datediff( inte.dataFin, inte.dataIni )) AS permanencia
                                                    FROM internacao AS inte
                                                    GROUP BY periodo
                                                    ORDER BY periodo ASC, permanencia ASC";

                            $resultado_internacaoMes = mysqli_query($conn, $result_internacaoMes);
                            
                
                            while($rows_internacaoMes = mysqli_fetch_assoc($resultado_internacaoMes)){ ?>
								<tr>
                                    
									
                                    <td><?php echo $rows_internacaoMes['periodo']; ?></td>
                                    <td><?php echo $rows_internacaoMes['quantidade']; ?></td>
                                    <td><?php echo $rows_internacaoMes['permanencia']; ?></td>
							<?php } ?>

                </tbody>
            </table>
        </div>
    </body>
</html>
