<?php

require "vendor/autoload.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();

$nome = $_GET['nome'];
$diretor = $_GET['diretor'];
$mes = $_GET['mes'];
$folgas = $_GET['folgas'];
$periodo = $_GET['periodo'];

$options->setIsRemoteEnabled(true);
$options->setChroot(__DIR__);
$options->set('isRemoteEnabled', true);


$dompdf = new Dompdf($options);

$dompdf->loadHtmlFile("http://localhost/pontoAutomatico/tabela.php?nome=$nome&diretor=$diretor&mes=$mes&folgas=$folgas&periodo=$periodo");

$dompdf->setPaper("A4");

$dompdf->render();

$dompdf->stream('sample-document.pdf', ['Attachment' => false]);
