
//funcion estados
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

                    filas = filas + '<tr><td class="cell">'+result[i].id+'</td><td class="cell ">'+result[i].EDO+'</td><td class="cell ">'+result[i].DESCRIP+'</td></tr>';
                }

                $("#contenido").html(filas);

            }

        });



    };
