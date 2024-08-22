<?php


$periodo = $_GET['periodo'];

$dispensa = $_GET['folgas'];
$dispensa = explode(',', $dispensa);
$mes = $_GET['mes'];
$ano = date('Y');
$carga = $_GET['carga'];

$dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$date = date('d-m-y');



function diasUteis($dias, $date, $dispensa, $periodo, $mes, $carga){
        
    for ($i = 1; $i <= $dias; $i++) {

        

        
        $date = date($i .'-'. $mes .'-Y');

        //finais de semana
        if (isWeekend2($date)>= 6) {
            echo "<tr>";
            echo "<td>";
                
            echo $i;
            
            $escolha = rand(1, 2);
          
            if ($escolha == 1) {
                $hora = $manha = [
                    'entrada' => '08:0' . rand(0, 4),
                    'saida' => '14:0' . rand(0, 4),
                ];
            } else {
                $hora = $manhaExtra = [
                    'entrada' => '07:5' . rand(6, 9),
                    'saida' => '14:0' . rand(0, 5),
                ];
            }
        
            echo "<td>";
            if(isWeekend2($date)== 6){
                echo 'SABADO';
            }elseif(isWeekend2($date)==7){
                echo 'DOMINGO';
            }
            echo ' ';
            echo "</td>";
            echo "<td>";
            echo "</td>";
            echo "<td>";
            echo "</td>";
            echo "<td>";
            if(isWeekend2($date)== 6){
                echo 'SABADO';
            }elseif(isWeekend2($date)==7){
                echo 'DOMINGO';
            }
            echo "</td>";
            echo "</td>";
            echo "</tr>";
        }

        // dias da semana
        if (!isWeekend($date)) {
            echo "<tr>";
            echo "<td>";
            if (in_array($i, $dispensa)) { 
                echo $i;
                echo "<br>";
                echo "<td>";
                echo ' ';
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo ' ';
                echo "</td>";
                echo "</td>";
                echo "</tr>";
            }else{
                echo $i;
                echo "<br>";
                
                $escolha = rand(1, 2);
                if(($periodo == 'manha' && ($carga == 'seis'))){
                    if ($escolha == 1) {
                        $hora = $manha = [
                            'entrada' => '08:0' . rand(0, 4),
                            'saida' => '14:0' . rand(0, 4),
                        ];
                    } else {
                        $hora = $manhaExtra = [
                            'entrada' => '07:5' . rand(6, 9),
                            'saida' => '14:0' . rand(0, 5),
                        ];
                    }
                }else if(($periodo == 'tarde' && ($carga == 'seis'))){
                    if ($escolha == 1) {
                        $hora = $manha = [
                            'entrada' => '11:0' . rand(0, 4),
                            'saida' => '17:0' . rand(0, 4),
                        ];
                    } else {
                        $hora = $manhaExtra = [
                            'entrada' => '10:5' . rand(6, 9),
                            'saida' => '17:0' . rand(0, 5),
                        ];
                    }
                }else if(($periodo == 'manha' && ($carga == 'quatro'))){
                    if ($escolha == 1) {
                        $hora = $manha = [
                            'entrada' => '08:0' . rand(0, 4),
                            'saida' => '12:0' . rand(0, 4),
                        ];
                    } else {
                        $hora = $manhaExtra = [
                            'entrada' => '07:5' . rand(6, 9),
                            'saida' => '12:0' . rand(0, 5),
                        ];
                    }
                }else if(($periodo == 'tarde' && ($carga == 'quatro'))){
                    if ($escolha == 1) {
                        $hora = $manha = [
                            'entrada' => '13:0' . rand(0, 4),
                            'saida' => '17:0' . rand(0, 4),
                        ];
                    } else {
                        $hora = $manhaExtra = [
                            'entrada' => '12:5' . rand(6, 9),
                            'saida' => '17:0' . rand(0, 5),
                        ];
                    }
                }
                echo "<td>";
                echo $hora['entrada'];
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo $hora['saida'];
                echo "</td>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }
}

function getDateAsDateTime($date)
{
    return is_string($date) ? new DateTime($date) : $date;
}
function isWeekend($date)
{
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isWeekend2($date)
{
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N');
}