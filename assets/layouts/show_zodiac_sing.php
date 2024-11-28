<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="..\css\style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mea+Culpa&display=swap" rel="stylesheet">
</head>
<?php 
    include('header.php'); 
    $data_nascimento = $_POST['data_nascimento'];

    $data_nascimento_date = DateTime::createFromFormat('d/m/Y', $data_nascimento);
    if ($data_nascimento_date !== false)
    {
        $data_nascimento_formatada = $data_nascimento_date->format('d/m');
        $xml = simplexml_load_file('signos.xml');
        if (!$xml) 
        {
            echo "Erro ao carregar o arquivo XML.";
            var_dump($xml);
        }
        
        foreach ($xml->signo as $signo)
        {
            if (check_in_range($signo->dataInicio, $signo->dataFim, $data_nascimento_formatada))
            {
                echo "<p id='signo' style='text-align: center'>". $signo->signoNome. "</p>";
            }
        }
    }
    else
    {
        echo "Formato de data inválido. Por favor, use o formato dd/mm/aaaa.";
    }

    function check_in_range($data_inicio, $data_final, $data_nascimento)
    {
        $data_inicio = DateTime::createFromFormat('d/m', $data_inicio);
        $data_final = DateTime::createFromFormat('d/m', $data_final);
        $data_nascimento = DateTime::createFromFormat('d/m', $data_nascimento);

        if ($data_inicio > $data_final) {
            // Caso o intervalo passe o ano, fazemos a comparação considerando o "ano seguinte"
            // Para isso, adicionamos 1 ano às datas de início e final
            $data_final->modify('+1 year');
        }

        return (($data_nascimento >= $data_inicio) && ($data_nascimento <= $data_final));
    }
?>