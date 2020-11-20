<?php
  class Modelo_Grafico{
include_once 'conexion.php';



    function TraerDatosGraficosBar()
    {
      $sql = "SELECT * FROM serc.clues_tipo_unidad";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql))
      {
        while ($consulta_VU = mysqli_fetch_array($consulta))
        {
          $arreglo[] = $consulta_VU;
        }
        return $arreglo;

      }
    }
  }


?>
