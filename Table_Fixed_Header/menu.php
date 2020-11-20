<?php

    include_once 'conexion.php';



    $sql_query = 'SELECT * FROM catestados';



    $gsent = $pdo->prepare($sql_query);

    $gsent->execute();

    $resultado = $gsent->fetchALL();

   // var_dump($resultado);

    ?>



<!DOCTYPE html>

<html lang="en">

    <head>





	<title>Tabla SARS</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">



<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/util.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

<!--===============================================================================================-->

    <script type="text/javascript" src="js/jquery.min.js"></script>

<!--===============================================================================================-->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"> </script>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>




</head>

<body>



	<div class="limiter">

		<div class="container-table100">

			<div class="wrap-table100">



        <div class="row "><!-- // inicio del renglon -->

          <div class="col-sm">
      <!--  //chart "DONA"-->
            <div class="card">
                <div class="card-body" id="chart">
                </div>
            </div>
          </div>

          <div class="col-sm">
            <!--//ComboBox Multiple--->
                <div class="card">

                    <div class="card-body">

                        <select class="form-control" multiple id="idEstado" name="idEstado" onchange="seleccionaEstado()">

                            <option value="">--SELECCIONE UNA OPCION--</option>

                            <?php foreach($resultado as $dato): ?>

                            <option value="<?php echo $dato['id'] ?>"><?php echo $dato['DESCRIP'] ?></option>

                            <?php endforeach ?>

                        </select>

                    </div>

                </div>

              </div>


            <!--    //Tabla de Estados -->
				<div class="table100 ver1 m-b-110">

					<div class="table100-head">

						<table>
              <!--//cabecera de Tabla -->
							<thead>

								<tr class="row100 head">

									<th class="cell100 column1">ID</th>

									<th class="cell100 column2">ESTADO</th>

									<th class="cell100 column3">DESCRIPCIÓN</th>



								</tr>

							</thead>

						</table>

					</div>


        <!--  //contenido de tabla -->
					<div class="table100-body js-pscroll">

						<table>

							<tbody id="contenido">

                                <?php foreach($resultado as $dato): ?>

								<tr class="row100 body">

                                    <td class="cell100 column1"><?php echo $dato['id'] ?></td>



									<td class="cell100 column2"><?php echo $dato['EDO'] ?></td>

									<td class="cell100 column3"><?php echo $dato['DESCRIP'] ?></td>



								</tr>
                  <?php endforeach ?>

							</tbody>

						</table>

					</div>



          <div class="table100-body js-pscroll">

						<table>

							<tbody id="contenido">

                                <?php foreach($resultado as $dato): ?>

								<tr class="row100 body">

                                    <td class="cell100 column1"><?php echo $dato['id'] ?></td>

									<td class="cell100 column2"><?php echo $dato['EDO'] ?></td>

									<td class="cell100 column3"><?php echo $dato['DESCRIP'] ?></td>



								</tr>

                            <?php endforeach ?>

							</tbody>

						</table>

              </div>

            </div> <!--// fin tabla de Estados -->

          </div><!--// fin del row #1-->

        </div><!--// fin del wrap table-->

      </div><!--//fin contenedor tabla-->

    </div><!--//fin limiter-->




</body>


<!--//funciones-->
<script>

$(document).ready(function() {

    $('#idEstado').select2();

});

    function seleccionaEstado() {
        //console.log($("#idEstado").val());
        $.ajax({

            url: 'filtro_estados.php',

            data: "idEstado=" + $("#idEstado").val(),

            type: "POST",

            dataType: "json",

            cache: false,

            success: function(result){

                var filas = '';

                for (var i=0; i<result.length; i++) {

                    filas = filas + '<tr class="row100 body"><td class="cell100 column1"><td class="cell100 column1">'+result[i].id+'</td><td class="cell100 column2">'+result[i].EDO+'</td><td class="cell100 column3">'+result[i].DESCRIP+'</td></tr>';

                }

                $("#contenido").html(filas);

            }

        });



    }

      </script>






      <script>///Chart de DONA
            var options = {
            series: [44, 55, 41, 17, 15],
            chart: {
            type: 'donut',
            },
            responsive: [{
            breakpoint: 480,
            options: {
            chart: {
            width: 100
            },
            legend: {
            position: 'bottom'
            }
            }
            }]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();



    </script>

</html>
