<?php
    include_once 'conexion.php';
    $idClues = $_POST['idClues'];
    //echo print_r($idEstado);
    if(!empty($idClues)){
        $varios = explode(",", $idClues);
        if(!empty($varios)){
            //$idEstado = intval($idEstado);
            $sql_query = 'SELECT * FROM clues WHERE id IN (' . $idClues . ')';
            $gsent = $pdo->prepare($sql_query);
            $gsent->execute();
            $resultado = $gsent->fetchALL();
            echo json_encode($resultado);

        }
    }





?>
