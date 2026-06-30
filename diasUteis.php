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
        if (isWeekend2($date) >= 6) {
            if (isWeekend2($date) == 6) {
                $rotulo = 'SÁBADO';
            } else {
                $rotulo = 'DOMINGO';
            }

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            if ($periodo == 'manha') {
                echo "<td>" . $rotulo . "</td>";
                echo "<td>" . $rotulo . "</td>";
                echo "<td></td>";
                echo "<td></td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $rotulo . "</td>";
                echo "<td>" . $rotulo . "</td>";
            }
            echo "</tr>";
            continue;
        }

        // dias da semana
        echo "<tr>";
        echo "<td>" . $i . "</td>";

        if (in_array($i, $dispensa)) {
            // feriado / folga
            if ($periodo == 'manha') {
                echo "<td>FERIADO</td>";
                echo "<td>FERIADO</td>";
                echo "<td></td>";
                echo "<td></td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>FERIADO</td>";
                echo "<td>FERIADO</td>";
            }
            echo "</tr>";
            continue;
        }

        $escolha = rand(1, 2);
        if (($periodo == 'manha' && ($carga == 'seis'))) {
            if ($escolha == 1) {
                $hora = [
                    'entrada' => '08:0' . rand(0, 4),
                    'saida' => '14:0' . rand(0, 4),
                ];
            } else {
                $hora = [
                    'entrada' => '07:5' . rand(6, 9),
                    'saida' => '14:0' . rand(0, 5),
                ];
            }
        } else if (($periodo == 'tarde' && ($carga == 'seis'))) {
            if ($escolha == 1) {
                $hora = [
                    'entrada' => '11:0' . rand(0, 4),
                    'saida' => '17:0' . rand(0, 4),
                ];
            } else {
                $hora = [
                    'entrada' => '10:5' . rand(6, 9),
                    'saida' => '17:0' . rand(0, 5),
                ];
            }
        } else if (($periodo == 'manha' && ($carga == 'quatro'))) {
            if ($escolha == 1) {
                $hora = [
                    'entrada' => '08:0' . rand(0, 4),
                    'saida' => '12:0' . rand(0, 4),
                ];
            } else {
                $hora = [
                    'entrada' => '07:5' . rand(6, 9),
                    'saida' => '12:0' . rand(0, 5),
                ];
            }
        } else if (($periodo == 'tarde' && ($carga == 'quatro'))) {
            if ($escolha == 1) {
                $hora = [
                    'entrada' => '13:0' . rand(0, 4),
                    'saida' => '17:0' . rand(0, 4),
                ];
            } else {
                $hora = [
                    'entrada' => '12:5' . rand(6, 9),
                    'saida' => '17:0' . rand(0, 5),
                ];
            }
        }

        // As colunas sao relativas ao PERIODO de trabalho, nao ao horario do relogio.
        // periodo 'manha' -> preenche as colunas MANHA (entrada/saida)
        // periodo 'tarde' -> preenche as colunas TARDE (entrada/saida)
        if ($periodo == 'manha') {
            echo "<td>" . $hora['entrada'] . "</td>";
            echo "<td>" . $hora['saida'] . "</td>";
            echo "<td></td>";
            echo "<td></td>";
        } else {
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>" . $hora['entrada'] . "</td>";
            echo "<td>" . $hora['saida'] . "</td>";
        }

        echo "</tr>";
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