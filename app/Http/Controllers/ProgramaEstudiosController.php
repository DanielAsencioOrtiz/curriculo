<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramaEstudios;
use App\Models\PlanEstudio;
use App\Models\CursoDepartamento;
use App\Models\CursosPlanEstudios;
use App\Models\Competencias;
use App\Models\Capacidades;
use App\Models\MapaCurricular;
use App\Models\Sumilla;
use App\Models\Facultad;
use App\User;

class ProgramaEstudiosController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
        $this->middleware('auth');
    }

    public function index(){
        $programas_estudios = ProgramaEstudios::all();
        $facultades = Facultad::all();
        return view('admin.pages.programas_estudios.index')->with(compact('programas_estudios','facultades'));
    }

    public function store(Request $request){
        //Usuario
        $usuario = new User();
        $usuario->name = $request->nombre_programa;
        $usuario->persona = $request->persona;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->pass = $request->password;
        $usuario->rol = 'coteccu';
        $usuario->save();

        $usuario2 = new User();
        $usuario2->name = $request->nombre_programa;
        $usuario2->persona = $request->persona2;
        $usuario2->email = $request->email2;
        $usuario2->password = bcrypt($request->password2);
        $usuario2->pass = $request->password2;
        $usuario2->rol = 'supervisor';
        $usuario2->save();

        //Programa de Estudios
        $programa = new ProgramaEstudios();
        $programa->id_user = $usuario->id;
        $programa->id_user2 = $usuario2->id;
        $programa->nombre_programa = $request->nombre_programa;
        $programa->num_ciclos = $request->num_ciclos;
        $programa->id_facultad = $request->id_facultad;
        $programa->bloque = $request->bloque;
        $programa->porcentaje = 0.00;
        $programa->save();

        //Plan de estudios
        $plan = new PlanEstudio();
        $plan->id_programa_estudios = $programa->id;
        $plan->total_ht = 0;
        $plan->total_hp = 0;
        $plan->total_h = 0;
        $plan->total_creditos = 0;
        $plan->save();
        
        //Cursos Plan de Estudios
        $this->agregarCompetencia($programa->id, $plan->id, $programa->bloque);
        //$this->agregarCursoGeneral($plan->id);
        return back();
    }

    public function agregarCompetencia($id_programa_estudios, $id_plan_estudio, $bloque_programa){
        $competencia = Competencias::create([
            'id_programa_estudios' => $id_programa_estudios,
            'id_tipo_competencia' => 1,
            'codigo' => 'G1',
            'contenido' => 'COMPETENCIA INSTRUMENTAL: Gestiona el conocimiento científico-tecnológico básico, sus habilidades investigativas, el razonamiento lógico-matemático y la comunicación efectiva para analizar críticamente la realidad social y aportar soluciones a problemas relevantes de la región y del país.'
        ]);

        //Capacidades 1ra competencia
        $capacidad = new Capacidades();
        $capacidad->id_competencia = $competencia->id;
        $capacidad->codigo = 'G1.01';
        $capacidad->contenido = 'Emplea los fundamentos de la Lógica, Matemática y el conocimiento científico-tecnológico para analizar objetiva, racional, crítica y creativamente problemas de su entorno social.';
        $capacidad->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'I';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'II';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI
        //Curso Articulado
        $curso = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO01',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Matemática',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 1,
            'hp' => 6,
            'h_semana' => 7,
            'total_h' => 80,
            'creditos' => 4,
            'posicion' => '0 -140',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso->id;
        $sumilla->contenido_sumillas = 'La asignatura de Matemática, es de naturaleza obligatoria y teórico-práctica; tiene como propósito que el estudiante aplique la lógica y la matemática para desarrollar crítica y creativamente los procesos de la investigación y la resolución de problemas cotidianos, científicos y tecnológicos. Los contenidos a desarrollarse se agrupan en tres (3) unidades o bloques temáticos: I Unidad: Lógica proposicional y Lógica de predicados. II Unidad: Conjuntos, números reales. Ecuaciones e inecuaciones. Aplicaciones a problemas de la vida real relacionados con la Carrera. III Unidad: Relaciones binarias, funciones y aplicaciones. Aplicaciones a problemas de la vida real relacionados con la carrera. Las estrategias de enseñanza-aprendizajes principales a emplearse son: Resolución de problema y/o aprendizaje basado en proyectos, acompañados de software matemático.';
        //$sumilla->ejes_transversales = 'Investigación formativa, I+D+i (investigación + desarrollo + innovación), identidad,
        //interculturalidad e inclusividad.';
        $sumilla->perfil_docente = 'Licenciado en Matemáticas con Grado de Maestría o Doctorado';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso->id;
        $departamento->id_departamento = 13;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso->id;
        $mapa->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'V';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'VI';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI
        //CURSO 02
        $curso2 = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO07',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Metodología de la investigación científica',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 3,
            'hp' => 2,
            'h_semana' => 5,
            'total_h' => 80,
            'creditos' => 4,
            'posicion' => '0 -420',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso2->id;
        $sumilla->contenido_sumillas = 'La asignatura de Metodología de la investigación científica pertenece al área de Estudios Generales, es de naturaleza teórica y práctica
        y de carácter obligatoria. Tiene como propósito que el estudiante elabore un proyecto de investigación básico en su especialidad, a partir
        del uso de la epistemología y de herramientas tecnológicas; con sentido crítico orientado a transformar la realidad de su entorno.
        Los bloques temáticos a desarrollar, son:
        I. Unidad: Epistemología de la Investigación: 1. Ciencia, 2. Investigación, 3. Epistemología, 4. Epistemología e investigación.
        II. Unidad: Enfoques de la Investigación: 1. Enfoque cuantitativo, 2. Enfoque cualitativo, 3. Enfoque mixto. Ejemplos.
        III. Unidad: El proyecto de investigación científica: 1. Naturaleza y fundamentos, 2. Componentes y estructura, 3. Procesos de
        elaboración
        Estrategias de enseñanza - aprendizaje: Seminario – Taller, análisis de artículos de investigación, presentación y discusión de
        proyectos.';
        $sumilla->ejes_transversales = 'Responsabilidad social universitaria, investigación formativa, I+D+i (investigación + desarrollo + innovación),
Sostenibilidad ambiental, Ética y ciudadanía, Identidad, interculturalidad e inclusividad, Multidisciplinariedad e
interdisciplinariedad.';
        $sumilla->perfil_docente = '<ul>
            <li>Docente Licenciado en Filosofía, o Licenciado en Educación secundaria
con la Especialidad de Filosofía, Psicología y Ciencias Sociales, con
grado de Maestro o Doctor, adscrito al Departamento Académico de
Filosofía y Arte, con especializaciones y publicaciones en Filosofía,
Lógica, Epistemología, Metodología, o investigación científica.</li>
            <li>Docentes de Departamentos Académicos afines a los programas
profesionales que sean expresamente requeridos por las Direcciones de
Escuelas profesionales correspondientes: investigadores, con
experiencia en el dictado de la asignatura de investigación científica.</li>
          
        </ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso2->id;
        $departamento->id_departamento = 21;
        $departamento->save();

        //AQUI PREGUNTAR
        //$departamento = new CursoDepartamento();
        //$departamento->id_curso = $curso2->id;
        //$departamento->id_departamento = 18;
        //$departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso2->id;
        $mapa->save();

        //------------------------------------------------------------------------------------------------------------------------

        $capacidad = new Capacidades();
        $capacidad->id_competencia = $competencia->id;
        $capacidad->codigo = 'G1.02';
        $capacidad->contenido = 'Emplea los fundamentos, recursos y técnicas de la comunicación para analizar adecuadamente diversos textos, preferentemente académicos, y sistematizar objetiva, argumentada, crítica y documentadamente conclusiones y alternativas de solución frente a problemas regionales y nacionales relevantes.';
        $capacidad->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'II';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'I';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

        //CURSO 1
        $curso = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo_capacitaciones' => $capacidad->codigo,
            'codigo' => 'GO03',
            'nombre' => 'Comunicación y Lectura crítica (Comunicación 1)',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 3,
            'hp' => 2,
            'h_semana' => 5,
            'total_h' => 80,
            'creditos' => 4,
            'posicion' => '0 0',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso->id;
        $sumilla->contenido_sumillas = 'La asignatura de Comunicación y Lectura Crítica pertenece al Área de Estudios Generales, es de naturaleza teórico-práctica y carácter obligatorio. El propósito del curso es que el estudiante emplee los fundamentos, recursos y técnicas de la comunicación humana para analizar adecuadamente diversos textos, preferentemente académicos y sistematizar, objetiva, argumentada, crítica y documentadamente conclusiones y alternativas de solución frente a problemas regionales y nacionales relevantes.
Los contenidos a desarrollarse se agrupan en tres unidades o bloques temáticos:
I Unidad: La comunicación, definición, características, tipos, factores, enfoques, problemas y alternativas.
II Unidad: La lectura, definición, factores, tipos y estrategias, ejercicios.
III Unidad: Mecanismos retóricos, técnicos y argumentativos de la oralidad. Ejercicios.
Las estrategias principales de enseñanza aprendizaje son de procesamiento complejo, clasificación, organización y sistematización de la información, técnicas de trabajo grupal';
        //$sumilla->ejes_transversales = 'Investigación formativa, Ética y ciudadanía, Identidad, interculturalidad e inclusividad';
        $sumilla->perfil_docente = '<ul><li>Licenciado en educación secundaria, mención Lengua y Literatura.</li><li>Grado de Maestro o Doctor.</li><li>Estudios de especialización en lingüística y comunicación.</li><li>Experiencia en publicaciones académicas y/o científicas.</li></ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso->id;
        $departamento->id_departamento = 24;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso->id;
        $mapa->save();



        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'III';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'IV';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

        //CURSO 02
        $curso2 = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO05',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Redacción de textos académicos (Comunicación 2)',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 1,
            'hp' => 4,
            'h_semana' => 5,
            'total_h' => 80,
            'creditos' => 3,
            'posicion' => '0 -420',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso2->id;
        $sumilla->contenido_sumillas = 'La asignatura de Redacción de textos académicos pertenece al Área de Estudios Generales, es de naturaleza teórico práctica y carácter obligatorio, tiene como propósito que el estudiante domine la habilidad comunicativa de escribir textos académicos en forma clara, coherente y contextualizada, basado en la lingüística textual, las normas gramaticales y la ortografía de la lengua española.
        Al finalizar el curso el estudiante será capaz de producir textos académicos teniendo en cuenta normas lingüísticas y gramaticales del idioma castellano.
        Los contenidos a desarrollarse se agrupan en tres unidades o bloques temáticos:
        I Unidad: El texto académico, definición, propósitos, estructura y tipos
        II Unidad: Condiciones y requisitos para su elaboración. Elementos cohesivos y de coherencia del texto académico.
        III Unidad: Redacción de textos académico: Reseña, ensayo, poster, artículo
        Las estrategias principales de enseñanza aprendizaje son de procesamiento complejo, clasificación, organización y sistematización de la información, técnicas de trabajo grupal';
        //$sumilla->ejes_transversales = 'Responsabilidad social universitaria, Investigación formativa, I+D+i (investigación + desarrollo
        //+ innovación), Sostenibilidad ambiental, Ética y ciudadanía, identidad, Interculturalidad e
        //inclusividad, Multidisciplinariedad e interdisciplinariedad.';
        $sumilla->perfil_docente = '<ul><li>Licenciado en educación secundaria, mención Lengua y Literatura.</li><li>Grado de Maestro o Doctor.</li><li>Estudios de especialización en lingüística, comunicación, didáctica de la lengua.</li><li>Experiencia en publicaciones académicas y/o científicas.</li></ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso2->id;
        $departamento->id_departamento = 24;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso2->id;
        $mapa->save();


        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'VI';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'V';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

        //CURSO 03
        $curso3 = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO08',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Análisis crítico de la realidad nacional',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 3,
            'hp' => 2,
            'h_semana' => 5,
            'total_h' => 80,
            'creditos' => 4,
            'posicion' => '0 -420',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso3->id;
        $sumilla->contenido_sumillas = 'La asignatura Análisis crítico de la Realidad Nacional es de naturaleza obligatoria y teórico-práctica. Tiene como propósito que el
        estudiante desarrolle una comprensión crítica y contextualizada de los principales problemas, desafíos y oportunidades que caracterizan la
        realidad nacional peruana, a partir del análisis de datos, evidencias y perspectivas teóricas provenientes de las Ciencias Sociales.
        Los contenidos se desarrollarán en 3 unidades y bloques temáticos:
        I. Unidad: Realidad nacional; una comprensión desde lo espacio-geográfico, territorial y ambiental; problemas y soluciones
        II. Unidad: La realidad nacional desde lo político, económico, educativo y social; problemas y soluciones
        III. Unidad: Realidad nacional desde los ético-moral, lo cívico, lo cultural y los desafíos del siglo XXI.
        Las estrategias de enseñanza-aprendizajes principales a emplearse son: clases magistrales, análisis de documentos, videos y fuentes de
        información relevantes, estudios de caso y trabajos de investigación social, debates, mesas redondas y aprendizaje basado en problemas.
        Visitas de campo y entrevistas a actores relevantes.';
        //$sumilla->ejes_transversales = 'Responsabilidad social universitaria, Investigación formativa, I+D+i (investigación + desarrollo
        //+ innovación), Sostenibilidad ambiental, Ética y ciudadanía, identidad, Interculturalidad e
        //inclusividad, Multidisciplinariedad e interdisciplinariedad.';
        $sumilla->perfil_docente = '<ul><li>Licenciado en Antropología y/o Sociología.</li>
        <li>Con Maestría en Ciencias Sociales y/o afines.</li>
        <li>Licenciado en Educación secundaria, mención en Historia y Geografía</li>
        <li>Licenciado en Historia</li></ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso3->id;
        $departamento->id_departamento = 15;
        $departamento->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso3->id;
        $departamento->id_departamento = 22;
        $departamento->save();

        //SEGUN DOCUMENTO DICE HISTORIA, PREGUNTAR

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso3->id;
        $mapa->save();

        //------------------------------------------------------------------------------------------------------------------------

        //=====================================================================================================================================================================================
         //==================================================================================================================================================================================
        //==================================================================================================================================================================================
         //==================================================================================================================================================================================

        $competencia = Competencias::create([
            'id_programa_estudios' => $id_programa_estudios,
            'id_tipo_competencia' => 1,
            'codigo' => 'G2',
            'contenido' => 'COMPETENCIA INTERPERSONAL: Maneja sus habilidades interpersonales para adecuarse al medio demostrando valores ético-morales, cultura física y artística, responsabilidad y compromiso social y respeto por los derechos humanos, la diversidad cultural local, nacional y global, en favor de la construcción de una sociedad inclusiva, justa y democrática.'
        ]);

        //Capacidades de competencia 2
        $capacidad = new Capacidades();
        $capacidad->id_competencia = $competencia->id;
        $capacidad->codigo = 'G2.01';
        $capacidad->contenido = 'Demuestra conocimiento y manejo de su inteligencia emocional, adaptabilidad social, facilidad para trabajar en equipo, liderazgo, asertividad, proactividad, respeto por sí mismo, por los demás, la vida y la naturaleza.';
        $capacidad->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'II';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'I';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

        //CURSO 01
        $curso = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO04',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Desarrollo personal y gestión de las emociones',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 2,
            'hp' => 2,
            'h_semana' => 4,
            'total_h' => 64,
            'creditos' => 3,
            'posicion' => '140 0',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso->id;
        $sumilla->contenido_sumillas = 'La asignatura de Desarrollo personal y gestión de las emociones es de naturaleza y teórico-práctica y de carácter obligatorio; tiene como propósito que el estudiante desarrolle habilidades y actitudes intra e interpersonales que le permitan gestionar adecuadamente sus emociones para el logro tanto de su bienestar personal, así como de su interrelación armoniosa con su entorno, con un sentido profundo de la vida basada en una actitud crítica y reflexiva, con sentido ético y democrático; que sea consciente de la necesidad de tener un proyecto de vida.
Los contenidos a desarrollarse se agrupan en tres (3) unidades o bloques temáticos
I Unidad: La Inteligencia Emocional. Competencias intrapersonales.
II Unidad: Competencias interpersonales de la Inteligencia Emocional. Gestión de las emociones.
III Unidad: Aprender a ser y a convivir. El proyecto de vida personal.
Las estrategias de enseñanza–aprendizajes principales a emplearse son: Resolución de problemas, estudio de casos, técnicas creativas, debates, aprendizaje situado con conocimientos que posibiliten su desarrollo sostenido y autónomo.';
        //$sumilla->ejes_transversales = 'Responsabilidad social universitaria, investigación formativa, Ética y ciudadanía,
        //multidisciplinariedad e interdisciplinariedad.';
        $sumilla->perfil_docente = '<ul><li>Licenciado(a) en Educación, Especialidad: Filosofía, Psicología y Ciencias Sociales, Filosofía y Ciencias Sociales.</li>
        <li>Licenciado(a) en Psicología.</li>
        <li>Experiencia docente en Educación Superior Universitaria en cursos afines con un mínimo de 2 ciclos académicos.</li>
        <li>Demostrar creatividad, asertividad y proactividad</li></ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso->id;
        $departamento->id_departamento = 19;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso->id;
        $mapa->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'IV';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'III';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

         //CURSO 02
         $curso2 = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO06',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Derechos humanos y desarrollo social',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 3,
            'hp' => 2,
            'h_semana' => 5,
            'total_h' => 80,
            'creditos' => 4,
            'posicion' => '0 -420',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso2->id;
        $sumilla->contenido_sumillas = 'La asignatura de Derechos humanos y desarrollo social es obligatoria y de naturaleza teórico- práctica; tiene como propósito que el estudiante conozca la naturaleza, sentido e importancia de los derechos humanos y participe en actividades de promoción, difusión y defensa de los mismos demostrando respeto y valoración de sí mismo y de los demás, para que reconozca la centralidad de los derechos humanos como base para el desarrollo personal y de una sociedad inclusiva, justa, igualitaria y democrática.
Los contenidos básicos a desarrollarse, según bloques temáticos, son:
I)Unidad: Origen, teoría, fundamentos, sentido e importancia de los derechos humanos
II)Unidad: Los derechos humanos y el marco jurídico nacional e internacional. La moral, las leyes, la política y los Derechos Humanos
III)Unidad: Los derechos de la persona y la identidad personal y sociocultural; la convivencia ciudadana, el desarrollo del civismo y el bienestar social.
Estrategias de enseñanza–aprendizaje básicas: Resolución de problemas, estudio de casos, técnicas creativas, debates.';
        $sumilla->ejes_transversales = 'Responsabilidad social universitaria, investigación formativa, Ética y ciudadanía, multidisciplinariedad e interdisciplinariedad.';
        $sumilla->perfil_docente = 'Docentes: Abogado, Licenciado en Psicología, o Licenciado en Educación Secundaria con la especialidad de Filosofía, Psicología y CCSS o Licenciado en trabajo social, con grados de Maestro; capacitación en didáctica, asertivo, dinámico y empático.';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso2->id;
        $departamento->id_departamento = 16;
        $departamento->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso2->id;
        $departamento->id_departamento = 19;
        $departamento->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso2->id;
        $departamento->id_departamento = 15;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso2->id;
        $mapa->save();

        //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $capacidad = new Capacidades();
        $capacidad->id_competencia = $competencia->id;
        $capacidad->codigo = 'G2.02';
        $capacidad->contenido = 'Practica actividades deportivas, artísticas y recreacionales con disciplina, responsabilidad y respeto, cuidando su salud física, mental y al medio ambiente, valorando la diversidad cultural.';
        $capacidad->save();

        //SEGUN EL PLAN NO TIENE ASIGNATURAS OBLIGATORIAS SOLO LOS TALLERES ANALIZAR PREGUNTAR
       
        //------------------------------------------------------------------------------------------------ //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------- //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------- //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $competencia = Competencias::create([
            'id_programa_estudios' => $id_programa_estudios,
            'id_tipo_competencia' => 1,
            'codigo' => 'G3',
            'contenido' => 'COMPETENCIA SISTÉMICA: Gestiona sus aprendizajes de modo técnico, responsable, autónomo, crítico-creativo y permanente orientándolos hacia la comprensión de la realidad y la solución de problemas en diversas circunstancias personales, sociales y laborales.'
        ]);

        $capacidad = new Capacidades();
        $capacidad->id_competencia = $competencia->id;
        $capacidad->codigo = 'G3.01';
        $capacidad->contenido = 'Maneja adecuadamente sus aprendizajes, usando métodos, técnicas y herramientas, para optimizar su tiempo, mejorar sus logros académicos, aplicándolos en proyectos relacionados con problemas, avances y perspectivas de desarrollo de su campo profesional vinculados con la realidad sociocultural nacional.';
        $capacidad->save();

        //LOGICA PARA EL BLOQUE
        if ( $bloque_programa == 'A') {
            $ciclo = 'I';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }else{
            $ciclo = 'II';
            //aca tanbien debe cambiar el la posicion para la malla curricular lo hare despues
        }
        //HASTA AQUI

        //CURSO 01
        $curso = CursosPlanEstudios::create([
            'id_plan_estudio' => $id_plan_estudio,
            'ciclo' => $ciclo,
            'codigo' => 'GO02',
            'codigo_capacitaciones' => $capacidad->codigo,
            'nombre' => 'Métodos y técnicas de estudio',
            'tipo' => 'GENERAL',
            'naturaleza' => 'Teórico / Práctico',
            'ht' => 2,
            'hp' => 2,
            'h_semana' => 4,
            'total_h' => 64,
            'creditos' => 3,
            'posicion' => '140 -140',
            'color' => '#5FC341' ,
            'estado' => 'obligatoria'
        ]);

        $sumilla = new Sumilla();
        $sumilla->id_curso = $curso->id;
        $sumilla->contenido_sumillas = 'La asignatura Métodos y técnicas de estudios corresponde a los Estudios Generales, es obligatoria de y de naturaleza teórico-práctica; está orientada a desarrollar en los estudiantes un manejo adecuado de sus aprendizajes, usando métodos, técnicas y herramientas, para optimizar su tiempo, mejorar sus logros académicos, aplicándolos en proyectos relacionados con problemas, avances y perspectivas de desarrollo de su campo profesional vinculados con la realidad sociocultural nacional; es decir que gestione con éxito sus procesos de aprendizaje para garantizar una formación académico-profesional de calidad. Está organizada en tres bloques de contenidos:
I)Unidad: Estudiar en la Universidad: contexto, fines y desafíos de la Universidad. Los estudios universitarios en la sociedad actual: formas, problemas y responsabilidades.
II)Unidad: Estudio y aprendizaje: elementos, procesos, factores, condiciones y formas. Casos.
III)Unidad: Métodos y técnicas de estudio: lectura y procesamiento de textos (subrayado, sumillado, resumen, sinopsis); uso de organizadores visuales de información, manejo técnico de la bibliografía, técnicas expositivas. Casos.
Las estrategias principales de enseñanza aprendizaje son de procesamiento complejo, clasificación, organización y sistematización de la información, técnicas de trabajo grupal.';
        //$sumilla->ejes_transversales = 'Investigación formativa, I+D+i (investigación + desarrollo + innovación), identidad, interculturalidad e inclusividad.';
        $sumilla->perfil_docente = '<ul><li>Licenciado en educación secundaria, mención Psicología, filosofía y ciencias sociales</li><li>Psicólogo(a)</li><li>Estudios de especialización en tecnología de la educación o Maestría y/o Doctorado en educación</li></ul>';
        $sumilla->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso->id;
        $departamento->id_departamento = 19;
        $departamento->save();

        $departamento = new CursoDepartamento();
        $departamento->id_curso = $curso->id;
        $departamento->id_departamento = 18;
        $departamento->save();

        $mapa = new MapaCurricular();
        $mapa->id_capacidad = $capacidad->id;
        $mapa->id_curso_plan_estudios = $curso->id;
        $mapa->save();


         

        //------------------------------------------------------------------------------------------------------------------------
            // CURSOS ELECTIVOS SIN SUMILLA, AUN SIN POSICION, SIN DEPARTAMENTOS, SIN ARTICULACION YA QUE ESTARA VACIO PARA LUEGO ACTUALIZAR CON LO QUE INGRESEN O ELIGAN LOS COTECCUSS, CREAMOS 2 CURSOS ELECTIVOS QUE SERAN REEMPLAZADOS

        //HASTA AQUI
            //CURSO ELECTIVO 1
       
            $curso = CursosPlanEstudios::create([
                'id_plan_estudio' => $id_plan_estudio,
                'ciclo' => 'IV',
                'nombre' => 'Asignatura electiva 1',
                'tipo' => 'GENERAL',
                'creditos' => 3,
                'color' => '#5FC341' ,
                'estado' => 'electivo'
            ]);
             //CURSO ELECTIVO 2

             $curso2 = CursosPlanEstudios::create([
                'id_plan_estudio' => $id_plan_estudio,
                'ciclo' => 'V',
                'nombre' => 'Asignatura electiva 2',
                'tipo' => 'GENERAL',
                'creditos' => 3,
                'color' => '#5FC341' ,
                'estado' => 'electivo'
            ]);

    }

   

  
}
