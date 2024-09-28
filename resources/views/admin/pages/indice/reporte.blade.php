<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php 
    date_default_timezone_set('America/Lima');
    setlocale(LC_TIME, 'spanish'); ?>

    <style>
        @page {
               margin: 2.0cm 2.0cm 2.0cm 2.0cm;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px !important;
        }
    </style>
    
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center" style="font-size: 16px !important"><b>ÍNDICE</b></h1> <br>
            <table class="" style="width: 100% !important">
                <tbody>                   
                    <tr >
                        <td>1. SECCIONES PRELIMINARES</td>
                        <td>{{$indice->n_secciones_preliminares}}</td>
                    </tr>
                    <tr >
                        <td style="padding-left: 30px; margin-top: 7px !important">1.1. CRÉDITOS</td>
                        <td  style="margin-top: 7px !important">{{$indice->n_creditos}}</td>
                    </tr>
                    <tr>
                        <td  style="padding-left: 30px; margin-top: 7px !important">1.2. PRESENTACIÓN</td>
                        <td  style="margin-top: 7px !important">{{$indice->n_presentacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">1.3. INTRODUCCIÓN</td>
                        <td  style="margin-top: 7px !important">{{$indice->n_introduccion}}</td>
                    </tr>
                    <tr>
                        <td>2. SECCIONES FUNDAMENTALES DEL CURRÍCULO</td>
                        <td  style="margin-top: 7px !important">{{$indice->n_secciones_fundamentales}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.1. BASES DEL CURRÍCULO</td>
                        <td  style="margin-top: 7px !important">{{$indice->n_bases}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.1.1. Bases Normativas</td>
                        <td style="margin-top: 7px !important">{{$indice->n_bases_normativas}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.1.2. Bases de Identidad-Institucional</td>
                        <td style="margin-top: 7px !important">{{$indice->n_bases_identidad_institucional}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important" >2.1.3. Bases Teórico - Conceptuales</td>
                        <td style="margin-top: 7px !important">{{$indice->n_bases_teorico_conceptuales}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.2. CONTEXTUALIZACIÓN DEL PROGRAMA PROFESIONAL</td>
                        <td style="margin-top: 7px !important">{{$indice->n_contextualizacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.2.1. Síntesis del desarrollo histórico del Programa Profesional de la UNT</td>
                        <td style="margin-top: 7px !important">{{$indice->n_sintesis_desarrollo_historico}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.2.2. Determinación y justificación de la necesidad y pertinencia social y laboral del Programa Profesional en el ámbito de influencia regional, nacional e internacional</td>
                        <td style="margin-top: 7px !important">{{$indice->n_determinacion_justificacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.2.3. Desarrollo prospectivo del Programa Profesional</td>
                        <td style="margin-top: 7px !important">{{$indice->n_desarrollo_prospectivo}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.3. PERFILES Y OBJETIVOS DEL PROGRAMA PROFESIONAL</td>
                        <td style="margin-top: 7px !important">{{$indice->n_perfiles_objetivos}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.3.1. Perfil del ingresante</td>
                        <td style="margin-top: 7px !important">{{$indice->n_perfil_ingresante}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.3.2. Perfil del egresado</td>
                        <td style="margin-top: 7px !important">{{$indice->n_perfil_egresado}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.3.3. Objetivos del Programa Profesional</td>
                        <td style="margin-top: 7px !important">{{$indice->n_objetivos}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.3.4. Objetivos educacionales</td>
                        <td style="margin-top: 7px !important">{{$indice->n_objetivos_educacionales}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.4. MATRIZ DE ARTICULACIÓN DE COMPETENCIAS, CAPACIDADES, CURSOS Y EJES TRANSVERSALES</td>
                        <td style="margin-top: 7px !important">{{$indice->n_matriz_articulacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.5. MALLA CURRICULAR</td>
                        <td style="margin-top: 7px !important">{{$indice->n_malla_curricular}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.6. PLAN DE ESTUDIOS</td>
                        <td style="margin-top: 7px !important">{{$indice->n_plan_estudios}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.7. SUMILLAS DE LOS CURSOS</td>
                        <td style="margin-top: 7px !important">{{$indice->n_sumilla_cursos}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.8. SISTEMA DE EVALUACIÓN</td>
                        <td style="margin-top: 7px !important">{{$indice->n_sistema_evaluacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.8.1. Evaluación de los aprendizajes</td>
                        <td style="margin-top: 7px !important">{{$indice->n_evaluacion_aprendizajes}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.8.2. Evaluación del logro de competencias</td>
                        <td style="margin-top: 7px !important">{{$indice->n_evaluacion_logro}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 60px; margin-top: 7px !important">2.8.3. Evaluación curricular</td>
                        <td style="margin-top: 7px !important">{{$indice->n_evaluacion_curricular}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.9. LINEAMIENTOS DE EJECUCIÓN Y GESTIÓN CURRICULAR</td>
                        <td style="margin-top: 7px !important">{{$indice->n_lineamiento_ejecucion_gestion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.10. REQUISITOS DE GRADUACIÓN Y TITULACIÓN</td>
                        <td style="margin-top: 7px !important">{{$indice->n_requisitos_graduacion_titulacion}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.11. TABLA DE EQUIVALENCIAS</td>
                        <td style="margin-top: 7px !important">{{$indice->n_tabla_equivalencias}}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 30px; margin-top: 7px !important">2.12. REFERENCIAS BIBLIOGRÁFICAS</td>
                        <td style="margin-top: 7px !important">{{$indice->n_referencias_bibliograficas}}</td>
                    </tr>
                    <tr>
                        <td>3. ANEXOS</td>
                        <td style="margin-top: 7px !important">{{$indice->n_anexos}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>