<?php

require 'filtro_clues_tipo_unidad.php';

  $MG = new Modelo_Grafico();

  $consulta = $MG -> TraerDatosGraficosBar();
  echo json_encode($consulta);

?>
