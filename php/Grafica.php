<!DOCTYPE HTML>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="..\IconImages\IconoEncuesta.png" />
        
        <style type="text/css">
            #container {
                min-width: 310px;
                max-width: 800px;
                height: 400px;
                margin: 10% auto;
            }
        </style>
        <title>Reporte de Gráfica - Sistema de Encuestas</title>
    </head>

    <body>
 
        <script src="../js/highcharts.js"></script>
        <script src="../js/exporting.js"></script>
        <script src="../js/export-data.js"></script>
        <script src="../js/series-label.js"></script>

        <div id="container"></div>

        <script type="text/javascript">
            Highcharts.chart('container', {

                title: {
                    text: 'Promedio Docentes'
                },

                subtitle: {
                    text: 'Sistema de Encuestas - Gráfica Encuesta Evaluación Docente'
                },
                xAxis: {
                    title: {
                        text: 'Número de Pregunta'
                    },
                    categories: [

                        <?php for ($i = 1; $i <= 22; $i++) {
                            echo "$i" . ',';
                        }
                        ?>

                    ]
                },

                yAxis: {
                    min: 1,
                    max: 5,
                    title: {
                        text: 'Promedio Por Pregunta'
                    }
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        pointStart: 1
                    }
                },

                series: [{
                    name: 'Promedio',
                    data: [
                        <?php
                        include_once('Datos\conexion.php');
                        $CadenaConexion = ConectarABD();
                        $IdDocente = $_POST['Docente'];  
                        $Consulta = "SELECT Id_Preguntas, ROUND(AVG(Evaluacion),1) as 'PromedioGrupo' from tbl_copiaen where Id_Docente = $IdDocente AND Id_Preguntas BETWEEN 1 ANd 22 GROUP By Id_Preguntas";

                        $ResultadoConsulta = @mysqli_query($CadenaConexion, $Consulta)
                            or die("Error al realizar la consulta: " . @mysqli_error($CadenaConexion));
                            
                        ?>
                        <?php if(@mysqli_fetch_row($ResultadoConsulta)!=""){ ?>
                            <?php while ($Fila = mysqli_fetch_array($ResultadoConsulta, MYSQLI_BOTH)) { ?>                         
                                <?php echo  $Fila[1]; ?>,
                            <?php   } ?>
                        <?php }else{
                            header('location: Presentacion\FrmErrorConsultarGrafica.php');
                        }?>
                    ]
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }

            });
        </script>
    </body>
</html>