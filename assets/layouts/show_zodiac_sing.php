<?php 
    include('header.php'); 
    $data_nascimento = $_POST['data_nascimento'];

    $data_nascimento = DateTime::createFromFormat('Y-m-d', $data_nascimento);

    $data_nascimento_formatada = $data_nascimento->format('d/m');
    
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
            echo $signo->signoNome;
        }
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