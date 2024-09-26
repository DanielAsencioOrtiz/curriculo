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
            <b>3.3.1 Perfil del ingresante:</b>
            {!!$perfil->ingreso!!}
            <b>3.3.2 Perfil del egresado:</b>
            {!!$perfil->egreso!!}
            <b>3.3.3 Objetivos del Programa Profesional:</b>
            {!!$perfil->objetivos_programa!!}
            <b>3.3.4 Objetivos educacionales:</b>
            {!!$perfil->objetivos_educacionales!!}
        </div>
    </div>
</body>
</html>