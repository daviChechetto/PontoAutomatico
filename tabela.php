<?php
require_once 'diasUteis.php';

$nome = $_GET['nome'];
$diretor = $_GET['diretor'];
$mes = $_GET['mes'];
$periodo = $_GET['periodo'];
$carga = $_GET['carga'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

</head>

<body>
<div>
    <table>
        <thead>
            <tr>
                <th class='inicio' colspan="2">
                    NOME DO ESTAGIÁRIO
                </th>
                <td colspan="3">
                    <?= $nome  ?>
                </td>
            </tr>
            <tr>
                <th class='inicio' colspan="2">
                    LOCAL DE TRABALHO
                </th>
                <td colspan="3">
                    Diretoria Executiva de TI
                </td>
            </tr>
            <tr>
                <th class='inicio' colspan="2">
                    HORÁRIO DE ESTÁGIO
                </th>
                <td colspan="3">
                    <?php 
                    if(($periodo == 'manha') && ($carga == 'seis')){
                        echo '08h-14h';
                    }
                    else if(($periodo == 'manha') && ($carga == 'quatro')){
                        echo '08h-12h';
                    }
                    else if(($periodo == 'tarde') && ($carga == 'seis')){
                        echo '11h-17h';
                    }else{
                        echo '13h-17h';
                    } ?>
                </td>
            </tr>
            <tr>
                <th class='inicio' colspan="2">
                    RESPONSÁVEL DO SETOR
                </th>
                <td colspan="3">
                    <?php echo $diretor ?>
                </td>
            </tr>
            <tr>
                <th class='inicio' colspan="2">
                    MÊS DE REFERÊNCIA
                </th>
                <td colspan="3">
                    <?php 
                    switch($mes){
                        case 1: echo 'Janeiro';break;
                        case 2: echo 'Fevereiro';break;
                        case 3: echo 'Março';break;
                        case 4: echo 'Abril';break;
                        case 5: echo 'Maio';break;
                        case 6: echo 'Junho';break;
                        case 7: echo 'Julho';break;
                        case 8: echo 'Agosto';break;
                        case 9: echo 'Setembro';break;
                        case 10: echo 'Outubro';break;
                        case 11: echo 'Novembro';break;
                        case 12: echo 'Dezembro';break;
                    }
                    ?>
                </td>
            </tr>


        </thead>
        <tbody>
            <tr>
                <th rowspan="2" colspan="1">
                    DIA
                </th>
                <td rowspan="1" colspan="2">
                    MANHÃ
                </td>
                <td rowspan="1" colspan="2">
                    TARDE
                </td>

            <tr>
                <td rowspan="1">
                    ENTRADA
                </td>
                <td rowspan="1">
                    SAÍDA
                <td rowspan="1">
                    ENTRADA
                </td>
                <td rowspan="1">
                    SAÍDA
                </td>
            </tr>
            <?php diasUteis($dias, $date, $dispensa, $periodo,$mes, $carga) ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class='inicio'>
                    REGISTRAR AQUI ATESTADOS, JUSTIFICATIVAS E O QUAISQUER SITUAÇÃO ANORMAL
                </td>
            </tr>
            <tr>
                <td colspan="5" style="height: 15px;">
                </td>
            </tr>
            <tr>
                <td colspan="5" class='inicio'>
                    OBRIGATÓRIO ENTREGAR NO DPTO. DE PESSOAS ATÉ O DIA 10 DO MÊS SEGUINTE AO MÊS DE REFERÊNCIA, O NÃO RECEBIMENTO IMPLICARÁ A SUSPENSÃO DE SEUS PROVENTOS.
                </td>
            </tr>

        </tfoot>
    </table>
    <table>

        <table style="margin-top: 50px;">
            <tr >
                <td style="height: 15px; border-style: none;"> 
                    <hr style="width: 150px">
                </td>
                <td style="border-style: none;">
                    
                </td>
                <td style="border-style: none;">
                    <hr style="width: 150px">
                </td>
            </tr>
            <tr >
                <td style="height: 15px; border-style: none;"> 
                    ESTAGIÁRIO
                </td>
                <td style="height: 15px; border-style: none;">
                    
                </td>
                <td style="height: 15px; border-style: none;">
                    RESPONSÁVEL
                </td>
            </tr>
        </table>

</body>

</html>