<?php

$kalimat = $_GET['kalimat'];

$command = 'python main-process/tes.py "'.$kalimat.'"';
exec($command, $out, $error);
if($error == 0)
{
    $result = json_decode($out[0]);

    $delimiter1 = ";";
    $score      = explode($delimiter1, $result->arr_score);
    $totalScore = 0;
    foreach ($score as $key => $value) {
        $totalScore += $value;
    }
    echo $totalScore;
}

?>