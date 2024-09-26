@extends('admin.layouts._principal')

@section('css')
    <style>
        .gris{
            font-weight: bold;
            background-color: #d9d9d9;
        }
        .borde{
            border: 1px solid black;
        }
        .G{
            background-color: #5FC341;
        }
        .ESPECÍFICO{
            background-color: #F76725;
        }
        .ESPECIALIDAD{
            background-color: #41BCC3;
        }
        .GENERAL{
            background-color: #5FC341;
        }
        .EXTRACURRICULAR{
            background-color: #5FC341;
        }
    </style>
@endsection

@section('titulo')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Sumilla: {{$curso->nombre}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('sumillas')}}">Lista de Cursos</a></li>
            <li class="breadcrumb-item active">Sumilla</li>
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
                    <h1 style="font-family: initial;" align="center"> {{$curso->ciclo}} - CICLO</h1>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="{{route('sumilla.update')}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="curso_id" value="{{$curso->id}}">
              <table class="table borde">
                 <tr class="text-center borde {{$curso->tipo}}" >
                    <td><b>Código</b></td>
                    <td>{{$curso->codigo}}</td>
                    <td><b>Asignatura</b></td>
                     <td colspan="7" class="borde"><b>{{mb_strtoupper($curso->nombre,'utf-8')}}</b></td>
                 </tr>
                 <tr>
                    <td class="gris borde">Ciclo </td>
                    <td class="borde">{{$curso->ciclo}}</td>
                    <td class="gris borde">Total horas semanales: </td>
                    <td class="borde">{{$curso->h_semana}}</td>
                    <td class="gris borde">Créditos: </td>
                    <td class="borde">{{$curso->creditos}}</td>
                    <td class="gris borde">Requisito:</td>
                    <td class="borde" colspan="3">
                        @if (count($requisitos)>=2)
                            <ul>
                                @foreach ($requisitos as $row)
                                    <li>{{$row->requisito->nombre}}</li>
                                @endforeach
                            </ul>
                        @else
                            @foreach ($requisitos as $row)
                                {{$row->requisito->nombre}}
                            @endforeach
                        @endif
                    </td>
                 </tr>
                 <tr>
                     <td class="gris borde">Total horas</td>
                     <td class="borde">{{$curso->total_h}}</td>
                     <td class="gris borde">Horas por semana</td>
                     <td class="borde">{{$curso->h_semana}}</td>
                     <td class="gris borde">Créditos</td>
                     <td class="borde">{{$curso->creditos}}</td>
                     <td class="gris borde">HT</td>
                     <td class="borde">{{$curso->ht}}</td>
                     <td class="gris borde">HP</td>
                     <td class="borde">{{$curso->hp}}</td>

                 </tr>
                 <tr>
                     <td colspan="10" class="gris borde">Sumilla</td>
                   
                 </tr>
                 <tr>
                    <td colspan="10" class="borde">
                        <textarea required name="contenido_sumillas" class="form-control"  cols="30" rows="10">{{$sumilla->contenido_sumillas}}</textarea>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="2" class="gris borde">Ejes Transversales</td>
                    <td colspan="8" class="borde">
                    
                        @if ($curso->tipo == 'GENERAL' && !is_null($sumilla->ejes_transversales) )
                            <textarea required name="ejes_transversales" class="form-control"  cols="30" rows="3">{{$sumilla->ejes_transversales}}</textarea>
                        @else
                            <input type="checkbox" name="respo_social" value="1" @if ($sumilla->respo_social == 1) checked @endif> Responsabilidad social universitaria |
                            <input type="checkbox" name="inves_formativa" value="1" @if ($sumilla->inves_formativa == 1) checked @endif> Investigación formativa |
                            <input type="checkbox" name="idi" value="1" @if ($sumilla->idi == 1) checked @endif> I+D+i (investigación + desarrollo + innovación) |
                            <input type="checkbox" name="sostenibilidad" value="1" @if ($sumilla->sostenibilidad == 1) checked @endif> Sostenibilidad ambiental |
                            <input type="checkbox" name="etica" value="1" @if ($sumilla->etica == 1) checked @endif> Ética y ciudadanía |
                            <input type="checkbox" name="identidad" value="1" @if ($sumilla->identidad == 1) checked @endif> Identidad, interculturalidad e inclusividad |
                            <input type="checkbox" name="inter_multi" value="1" @if ($sumilla->inter_multi == 1) checked @endif> Interdisciplinariedad y multidisciplinariedad
                        @endif
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="gris borde">Departamento(s)
                        Académico(s)
                        Responsable (s)</td>
                    <td colspan="3" class="borde">
                        @if (count($departamentos)>=2)
                            <ul>
                                @foreach ($departamentos as $item)
                                    <li>{{$item->departamento->nombre_departamento}}</li>
                                @endforeach
                            </ul>
                        @else
                            @foreach ($departamentos as $item)
                                {{$item->departamento->nombre_departamento}}
                            @endforeach
                        @endif
                    </td>
                    <td colspan="2" class="gris borde">Perfil específico
                        del docente /
                        equipo formador</td>
                    <td colspan="3" class="borde">
                        @if ($curso->tipo == 'GENERAL')
                            <div>{!! $sumilla->perfil_docente !!}</div>
                        @else
                        <textarea required name="perfil_docente" class="form-control"  cols="30" rows="5">{{ $sumilla->perfil_docente }}</textarea>
                        @endif
                       
                    </td>
                </tr>
              </table>
              <div class="row">
                  <div class="col-sm-3"></div>
                  @if ($curso->tipo == 'GENERAL' || $curso->tipo == 'EXTRACURRICULAR')
                          <div class="col-sm-6">
                            <a href="{{route('sumillas')}}" class="btn btn-default btn-block">ATRÁS</a>
                          </div>
                  @else
                  <div class="col-sm-3">
                      <a href="{{route('sumillas')}}" class="btn btn-default btn-block">ATRÁS</a>
                  </div>
                  <div class="col-sm-3">         
                    <button type="submit" class="btn btn-success btn-block">GUARDAR SUMILLA</button>
                  </div>
                  @endif
                  <div class="col-sm-3"></div>
              </div>
          </form>
        </div>
        <!-- /.card-body -->
    </div>

</div>
@endsection

@section('scripts')
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard3.js')}}"></script>
@endsection