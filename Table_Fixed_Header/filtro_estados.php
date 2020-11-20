<?php
    include_once 'conexion.php';
    $idEstado = $_POST['idEstado'];
    //echo print_r($idEstado);
    if(!empty($idEstado)){
        $varios = explode(",", $idEstado);
        if(!empty($varios)){
            //$idEstado = intval($idEstado);
            $sql_query = 'SELECT * FROM catestados WHERE id IN (' . $idEstado . ')';
            $gsent = $pdo->prepare($sql_query);
            $gsent->execute();
            $resultado = $gsent->fetchALL();
            echo json_encode($resultado);

        }
    }



?>
