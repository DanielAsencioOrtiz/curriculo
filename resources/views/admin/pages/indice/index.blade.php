@extends('admin.layouts._principal')

@section('css')

@endsection

@section('titulo')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Indice de : {{$programa_estudio->nombre_programa}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item active">Indice</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('contenido')
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="background-color: #F33154; color: white; border-radius: 10px">
                    <h2  align="center">INDICE</h2>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-1">
                    <a href="#" data-toggle="modal" data-target="#info" 
                         class="btn btn-block btn-info"><i class="fa fa-question"></i></a>
                </div>
            </div>
        </div>
        @if (session('mensaje'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{route('indice.update')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <table class="" style="width: 100% !important">
                        <tbody>
                            <input type="hidden" name="id_programa_estudios" value="{{$programa_estudio->id}}" required class="form-control">
                            
                            <tr>
                                <td style="font-weight: bold">1. SECCIONES PRELIMINARES</td>
                                <td><input type="number" name="n_secciones_preliminares" value="{{$indice->n_secciones_preliminares}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">1.1. CRÉDITOS</td>
                                <td><input type="number" name="n_creditos" value="{{$indice->n_creditos}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">1.2. PRESENTACIÓN</td>
                                <td><input type="number" name="n_presentacion" value="{{$indice->n_presentacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">1.3. INTRODUCCIÓN</td>
                                <td><input type="number" name="n_introduccion" value="{{$indice->n_introduccion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">2. SECCIONES FUNDAMENTALES DEL CURRÍCULO</td>
                                <td><input type="number" name="n_secciones_fundamentales" value="{{$indice->n_secciones_fundamentales}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.1. BASES DEL CURRÍCULO</td>
                                <td><input type="number" name="n_bases" value="{{$indice->n_bases}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.1.1. Bases Normativas</td>
                                <td><input type="number" name="n_bases_normativas" value="{{$indice->n_bases_normativas}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.1.2. Bases de Identidad-Institucional</td>
                                <td><input type="number" name="n_bases_identidad_institucional" value="{{$indice->n_bases_identidad_institucional}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.1.3. Bases Teórico - Conceptuales</td>
                                <td><input type="number" name="n_bases_teorico_conceptuales" value="{{$indice->n_bases_teorico_conceptuales}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.2. CONTEXTUALIZACIÓN DEL PROGRAMA PROFESIONAL</td>
                                <td><input type="number" name="n_contextualizacion"  value="{{$indice->n_contextualizacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.2.1. Síntesis del desarrollo histórico del Programa Profesional de la UNT</td>
                                <td><input type="number" name="n_sintesis_desarrollo_historico" value="{{$indice->n_sintesis_desarrollo_historico}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.2.2. Determinación y justificación de la necesidad y pertinencia social y laboral del Programa Profesional en el ámbito de influencia regional, nacional e internacional</td>
                                <td><input type="number" name="n_determinacion_justificacion" value="{{$indice->n_determinacion_justificacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.2.3. Desarrollo prospectivo del Programa Profesional</td>
                                <td><input type="number" name="n_desarrollo_prospectivo" value="{{$indice->n_desarrollo_prospectivo}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.3. PERFILES Y OBJETIVOS DEL PROGRAMA PROFESIONAL</td>
                                <td><input type="number" name="n_perfiles_objetivos" value="{{$indice->n_perfiles_objetivos}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.3.1. Perfil del ingresante</td>
                                <td><input type="number" name="n_perfil_ingresante" value="{{$indice->n_perfil_ingresante}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.3.2. Perfil del egresado</td>
                                <td><input type="number" name="n_perfil_egresado" value="{{$indice->n_perfil_egresado}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.3.3. Objetivos del Programa Profesional</td>
                                <td><input type="number" name="n_objetivos" value="{{$indice->n_objetivos}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.3.4. Objetivos educacionales</td>
                                <td><input type="number" name="n_objetivos_educacionales" value="{{$indice->n_objetivos_educacionales}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.4. MATRIZ DE ARTICULACIÓN DE COMPETENCIAS, CAPACIDADES, CURSOS Y EJES TRANSVERSALES</td>
                                <td><input type="number" name="n_matriz_articulacion" value="{{$indice->n_matriz_articulacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.5. MALLA CURRICULAR</td>
                                <td><input type="number" name="n_malla_curricular" value="{{$indice->n_malla_curricular}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.6. PLAN DE ESTUDIOS</td>
                                <td><input type="number" name="n_plan_estudios" value="{{$indice->n_plan_estudios}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.7. SUMILLAS DE LOS CURSOS</td>
                                <td><input type="number" name="n_sumilla_cursos" value="{{$indice->n_sumilla_cursos}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.8. SISTEMA DE EVALUACIÓN</td>
                                <td><input type="number" name="n_sistema_evaluacion" value="{{$indice->n_sistema_evaluacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.8.1. Evaluación de los aprendizajes</td>
                                <td><input type="number" name="n_evaluacion_aprendizajes"  value="{{$indice->n_evaluacion_aprendizajes}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.8.2. Evaluación del logro de competencias</td>
                                <td><input type="number" name="n_evaluacion_logro" value="{{$indice->n_evaluacion_logro}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 60px">2.8.3. Evaluación curricular</td>
                                <td><input type="number" name="n_evaluacion_curricular" value="{{$indice->n_evaluacion_curricular}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.9. LINEAMIENTOS DE EJECUCIÓN Y GESTIÓN CURRICULAR</td>
                                <td><input type="number" name="n_lineamiento_ejecucion_gestion" value="{{$indice->n_lineamiento_ejecucion_gestion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.10. REQUISITOS DE GRADUACIÓN Y TITULACIÓN</td>
                                <td><input type="number" name="n_requisitos_graduacion_titulacion" value="{{$indice->n_requisitos_graduacion_titulacion}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.11. TABLA DE EQUIVALENCIAS</td>
                                <td><input type="number" name="n_tabla_equivalencias" value="{{$indice->n_tabla_equivalencias}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 30px">2.12. REFERENCIAS BIBLIOGRÁFICAS</td>
                                <td><input type="number" name="n_referencias_bibliograficas" value="{{$indice->n_referencias_bibliograficas}}" required class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold">3. ANEXOS</td>
                                <td><input type="number" name="n_anexos" value="{{$indice->n_anexos}}" required class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                    <style>
                        tr:hover {background-color: rgba(120,120,128,.12);}
                    </style>

                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <a href="{{route('home')}}" class="btn btn-default btn-block">ATRÁS</a>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success btn-block">GUARDAR CAMBIOS</button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Información</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <div class="col-sm-12" align="justify">
                        <p>Los número de página se encuentran en el archivo del curriculo generado</p>
                    </div>
              </div>       
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div> <br>
@endsection

@section('scripts')

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.config.height  = 400;
    CKEDITOR.replace( 'contenido' );
</script>
@endsection