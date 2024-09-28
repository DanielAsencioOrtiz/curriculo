<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_programa_estudios')->references('id')->on('programa_estudios');
            $table->integer('n_secciones_preliminares')->nullable();
            $table->integer('n_creditos')->nullable();
            $table->integer('n_presentacion')->nullable();
            $table->integer('n_introduccion')->nullable();
            $table->integer('n_secciones_fundamentales')->nullable();
            $table->integer('n_bases')->nullable();
            $table->integer('n_bases_normativas')->nullable();
            $table->integer('n_bases_identidad_institucional')->nullable();
            $table->integer('n_bases_teorico_conceptuales')->nullable();
            $table->integer('n_contextualizacion')->nullable();
            $table->integer('n_sintesis_desarrollo_historico')->nullable();
            $table->integer('n_determinacion_justificacion')->nullable();
            $table->integer('n_desarrollo_prospectivo')->nullable();
            $table->integer('n_perfiles_objetivos')->nullable();
            $table->integer('n_perfil_ingresante')->nullable();
            $table->integer('n_perfil_egresado')->nullable();
            $table->integer('n_objetivos')->nullable();
            $table->integer('n_objetivos_educacionales')->nullable();
            $table->integer('n_matriz_articulacion')->nullable();
            $table->integer('n_malla_curricular')->nullable();
            $table->integer('n_plan_estudios')->nullable();
            $table->integer('n_sumilla_cursos')->nullable();
            $table->integer('n_sistema_evaluacion')->nullable();
            $table->integer('n_evaluacion_aprendizajes')->nullable();
            $table->integer('n_evaluacion_logro')->nullable();
            $table->integer('n_evaluacion_curricular')->nullable();
            $table->integer('n_lineamiento_ejecucion_gestion')->nullable();

            $table->integer('n_requisitos_graduacion_titulacion')->nullable();
            $table->integer('n_tabla_equivalencias')->nullable();
            $table->integer('n_referencias_bibliograficas')->nullable();
            $table->integer('n_anexos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indices');
    }
}
