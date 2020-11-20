
$(document).ready(function() {

        $('#idClues').select2();

    });



    ////funcion clues
        function seleccionaClues() {
            //console.log($("#idEstado").val());
            $.ajax({

                url: 'filtro_clues.php',

                data: "idClues=" + $("#idClues").val(),

                type: "POST",

                dataType: "json",

                cache: false,

                success: function(result){

                    var filas = '';

                    for (var i=0; i<result.length; i++) {



                        filas = filas + '<tr><td class="cell">'+result[i].id+'</td><td class="cell ">'+result[i].clave+'</td><td class="cell">'+result[i].institucion+'</td><td class="cell">'+result[i].EDO+'</td><td class="cell ">'+result[i].JUR+'</td><td class="cell ">'+result[i].MPO+'</td><td class="cell">'+result[i].LOC+'</td><td class="cell ">'+result[i].tipo_establecimiento+'</td><td class="cell ">'+result[i].tipologia+'</td><td class="cell">'+result[i].nombre_unidad+'</td></tr>';
                    }

                    $("#tabla2").html(filas);
                }
            });

        };
