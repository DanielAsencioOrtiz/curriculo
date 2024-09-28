<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramaEstudios;
use App\Models\Indice;
use Barryvdh\DomPDF\Facade as PDF;
use DB;

class IndiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $user_id = auth()->user()->id;
        $programa_estudio = ProgramaEstudios::where('id_user', $user_id)->first();
        //buscamos la presentacion
        $data = Indice::where('id_programa_estudios', $programa_estudio->id)->first();
        if(isset($data)){
            $indice = $data;
        }else{
            $indice = new Indice();
            $indice->id_programa_estudios = $programa_estudio->id;
            $indice->save();
        }

        return view('admin.pages.indice.index')->with(compact('indice', 'programa_estudio'));
    }

    public function update(Request $request){
        //dd($request->all());
        $indice = Indice::where('id_programa_estudios',$request->id_programa_estudios)->first();
        $indice->n_secciones_preliminares = $request->n_secciones_preliminares;
        $indice->n_creditos = $request->n_creditos;
        $indice->n_presentacion = $request->n_presentacion;
        $indice->n_introduccion = $request->n_introduccion;
        $indice->n_secciones_fundamentales = $request->n_secciones_fundamentales;
        $indice->n_bases = $request->n_bases;
        $indice->n_bases_normativas = $request->n_bases_normativas;
        $indice->n_bases_identidad_institucional = $request->n_bases_identidad_institucional;
        $indice->n_bases_teorico_conceptuales = $request->n_bases_teorico_conceptuales;
        $indice->n_contextualizacion = $request->n_contextualizacion;
        $indice->n_sintesis_desarrollo_historico = $request->n_sintesis_desarrollo_historico;
        $indice->n_determinacion_justificacion = $request->n_determinacion_justificacion;
        $indice->n_desarrollo_prospectivo = $request->n_desarrollo_prospectivo;
        $indice->n_perfiles_objetivos = $request->n_perfiles_objetivos;
        $indice->n_perfil_ingresante = $request->n_perfil_ingresante;
        $indice->n_perfil_egresado = $request->n_perfil_egresado;
        $indice->n_objetivos = $request->n_objetivos;
        $indice->n_objetivos_educacionales = $request->n_objetivos_educacionales;
        $indice->n_matriz_articulacion = $request->n_matriz_articulacion;
        $indice->n_malla_curricular = $request->n_malla_curricular;
        $indice->n_plan_estudios = $request->n_plan_estudios;
        $indice->n_sumilla_cursos = $request->n_sumilla_cursos;
        $indice->n_sistema_evaluacion = $request->n_sistema_evaluacion;
        $indice->n_evaluacion_aprendizajes = $request->n_evaluacion_aprendizajes;
        $indice->n_evaluacion_logro = $request->n_evaluacion_logro;
        $indice->n_evaluacion_curricular = $request->n_evaluacion_curricular;
        $indice->n_lineamiento_ejecucion_gestion = $request->n_lineamiento_ejecucion_gestion;
        $indice->n_requisitos_graduacion_titulacion = $request->n_requisitos_graduacion_titulacion;
        $indice->n_tabla_equivalencias = $request->n_tabla_equivalencias;
        $indice->n_referencias_bibliograficas = $request->n_referencias_bibliograficas;
        $indice->n_anexos = $request->n_anexos;
        $indice->save();

        return back()->with('mensaje', 'Indice actualizado');
    }

    public function reporte(){
        $user_id = auth()->user()->id;
        if(auth()->user()->rol == 'supervisor'  ){
            $programa_estudio = ProgramaEstudios::where('id_user2', $user_id)->first();
        }else{
            $programa_estudio = ProgramaEstudios::where('id_user', $user_id)->first();
        }
        $indice = Indice::where('id_programa_estudios', $programa_estudio->id)->first();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
                ->loadView('admin.pages.indice.reporte', compact('indice'))
                ->setPaper('a4', 'portrait');

        //return $pdf->download('presentacion.pdf');
        return $pdf->stream();
    }
}
