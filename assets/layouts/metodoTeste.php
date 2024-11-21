<?php 
    include('header.php'); 
    $data_nascimento = $_POST['data_nascimento'];
    $xml = simplexml_load_file('signos.xml');

    function verifica_data($data_nacimento, $dataInicio, $dataFim)
    {
        $data_nacimento_formatada = strtotime(date_format($data_nacimento, "d/m"));
        $data_inicio_formatada = strtotime(date_format($data_inicio, "d/m"));
        $data_fim_formatada = strtotime(date_format($data_fim, "d/m"));

        return (($data_nacimento_formatada  >= $data_inicio_formatada) && ($data_nacimento_formatada  <= $data_fim_formatada));
    }


    foreach($xml->children() as $obj)
    {
        $obj_string_data_inicio = (string) $obj->dataInicio;
        $obj_string_data_fim = (string) $obj->dataFim;

        verifica_data($data_nascimento, $obj_string_data_inicio,$obj_string_data_fim);
    }
?>