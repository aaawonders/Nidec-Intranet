<?php

require_once (__DIR__ . '/vendor/autoload.php');

// $data = "<h1 style='color: red; font-family: Helvética, sans-serif;'>Bem-vindo Mundo</h1>
//             ";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($data, 0);

$name = uniqid();
$path = realpath(__DIR__."/../../server/PDF");
$mpdf->Output();
$mpdf->Output("$path/$name.pdf", 'F');



$annex = "$path/$name.pdf";

include (__DIR__."/../Mailer/Mail.php");
