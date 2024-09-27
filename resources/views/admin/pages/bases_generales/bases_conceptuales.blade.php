@extends('admin.layouts._principal')

@section('css')

@endsection

@section('titulo')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Bases Generales de : {{$programa_estudio->nombre_programa}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item active">Bases Teórico-Conceptuales</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('contenido')
<div class="container">

    <div class="card">
        <div class="card-header" style="background-color: lightgrey !important">
            <div class="row">
                <div class="col-sm-2">
                    <a href="{{route('base_general')}}" class="btn btn-primary btn-block">Bases Normativas</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('base_instucional')}}" class="btn btn-primary btn-block">Bases de Identidad-Institucional</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('base_conceptuales')}}" class="btn btn-primary btn-block">Bases Teórico-Conceptuales</a>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="background-color: #F33154; color: white; border-radius: 10px">
                    <h2  align="center">BASES TEÓRICO-CONCEPTUALES</h2>
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
            <b>3.1.3 Bases Teórico - Conceptuales</b> <br>
            <form action="{{route('base_conceptuales.update1')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.1 Concepción socioantropológica y cultural
                        : </label>
                        <textarea name="concepcion_humano" required>
                            @if (is_null($base_general->concepcion_humano))
                                <b>a) Concepción de hombre</b>
                                <p style="text-align: justify">
                                    El hombre es un ser multidimensional y complejo, un todo; un ser natural-biológico, psico-espiritual
                                    y socio-histórico-cultural, y un ser emergente. En suma, es una realidad biopsicosocial y cultural
                                    que a través de largos y diversos procesos ontogenéticos (individuo), filogenéticos (especie) e
                                    históricos se ha ido construyendo y se sigue configurando personal y socialmente.<br><br>
                                    Su ser natural-biológico se refiere a lo corporal, a lo anatómico, neurofisiológico, bioquímico y
                                    genético del ser humano, su base o soporte material sobre el cual se desarrollan las demás
                                    dimensiones del hombre.<br><br>
                                    Su ser psico-espiritual corresponde a su mundo subjetivo, a su consciencia, a sus dimensiones
                                    cognitivas, afectivas y volitivas, las mismas que se expresan en distintas formas de actitudes y
                                    comportamientos.<br><br>
                                    Su ser socio-histórico-cultural comprende el ejercicio natural y necesario de la convivencia, del
                                    compartimiento de lo común, de la construcción conjunta de ideales y valores, de la creación de
                                    formas y condiciones favorables de vida para la sobrevivencia, el desarrollo personal y la conservación de 
                                    la especie. Surgen, así, las relaciones e instituciones religiosas, económicas,
                                    políticas, sociales, educativas, culturales, etc.</p>

                                <b>b) Concepción de sociedad</b>
                                <p style="text-align: justify">
                                    La sociedad es la congregación histórica y cultural de seres humanos en base al desarrollo de una
                                    serie de relaciones e interacciones en un determinado tiempo y dentro de un espacio geográfico o
                                    entorno natural. La manera en que los hombres se organizan y se relacionan, compatibilizando
                                    coincidencias y contradicciones, al interno y externo de las unidades, organizaciones e
                                    instituciones, que activan la dinámica social. Y hay sociedad, si hay historia e intereses comunes
                                    y una visión de futuro compartido.
                                    </p>

                                <b>c) Concepción de cultura</b>
                                <p style="text-align: justify">
                                    La cultura es el conjunto múltiple de productos y valores tanto materiales (instrumentos, artefactos,
                                    edificaciones, etc.) como ideales o espirituales (ciencia, filosofía, estética, religión, axiología,
                                    política, leyes, tradiciones, etc.) que han sido elaborados socio históricamente, difundidos y
                                    preservados, fundamentalmente, gracias a la educación.
                                        </p>
                            @else
                                {{$base_general->concepcion_humano}}
                            @endif
                        </textarea>
                    </div>
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
            </form> <br>
            <form action="{{route('base_conceptuales.update2')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.2 Concepción epistemológica: </label>
                        <textarea name="concepcion_episte" required>
                            @if (is_null($base_general->concepcion_episte))
                                <b>a) El conocimiento científico</b>
                                <p style="text-align: justify">
                                    Es un producto y proceso empírico-racional creado y recreado a partir de la investigación científica.
                                    Es el insumo fundamental en los procesos de enseñanza- aprendizaje en la educación universitaria
                                    y para el desarrollo de la ciencia y la tecnología al servicio de la humanidad. Por ello, según
                                    Romero (2010), la asimilación, difusión, creación, desarrollo, acumulación y aplicación del
                                    conocimiento científico es, quizás, la más importante tarea individual y colectiva de toda sociedad
                                    para poder desarrollarse.<br><br>
                                    El conocimiento científico, a diferencia de las otras formas de conocimiento y gracias a la
                                    rigurosidad de su método, permite al ser humano una comprensión más cabal de la realidad y de
                                    sí mismo, al agudizar sus facultades sensoriales e intelectuales para percibir, analizar, proyectar,
                                    crear y formar imágenes, símbolos y representaciones de su propia condición compleja como de
                                    la sociedad y de todas las cosas y relaciones que conforman el universo, y luego comunicarlo a
                                    otros con el fin de que el diálogo con sus semejantes confirme, niegue o modifique dichas
                                    imágenes, símbolos y representaciones y puedan ser útiles para mejorar la realidad y las
                                    condiciones de vida de los individuos y de la sociedad.<br><br>
                                    El conocimiento científico, al reconocer el dinamismo y complejidad de la realidad, articula los
                                    abordajes multidisciplinar y transdisciplinar, y axiológicamente se orienta a fortalecer los valores
                                    relacionados con la vida, la libertad, la igualdad, la responsabilidad social y el bien común.</p>
                            @else
                                {{$base_general->concepcion_episte}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>
            
            <form action="{{route('base_conceptuales.update3')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.3 Concepción pedagógica: </label>
                        <textarea name="concepcion_pedagogica" required>
                            @if (is_null($base_general->concepcion_pedagogica))
                            <b>a) La educación</b>
                                <p style="text-align: justify">
                                    La educación formal es un proceso sociocultural cuyo fin es la
                                    formación integral del ser humano mediante la relación
                                    dialéctica de enseñanza y aprendizaje, y el desarrollo holístico
                                    del sujeto educable, de sus capacidades, destrezas,
                                    facultades, sus actitudes y su sistema de valores en una
                                    realidad situada.<br><br>

                                    Es un proceso que se da a lo largo de toda la vida en tanto es
                                    una acción práctica que tiene al aprendizaje como la
                                    comprender y valorar las experiencias vividas en un
                                    determinado contexto histórico social. Dicha acción práctica
                                    es impulsada por las leyes biológicas de sobrevivencia y
                                    adaptación al medio (necesidades); a través de ello el ser
                                    humano pone en acción todo su potencial en búsqueda de su
                                    plenosbienestar yautorrealización, acorde con susposibilidades
                                    y limitaciones personales y del contexto histórico- social. <br><br>

                                    Este proceso de formación y desarrollo del ser humano es un
                                    proceso multidimensional y complejo, se da a partir de una serie de subprocesos y contradicciones tanto al interno como
                                    externo del hombre; del desarrollo de su individualización y
                                    socialización, e incluso de humanización y deshumanización,
                                    este caso contrario al fin de la educación se da como
                                    consecuencia de los efectos alienantes de los medios de
                                    comunicación masiva y propiciadas por las actitudes acríticas
                                    de los sujetos. <br><br>

                                    Es importante destacar que existen diferencias y semejanzas
                                    entre instrucción y educación, en tanto son procesos
                                    interrelacionados; pero, mientras que la educación es un
                                    proceso de formación y desarrollo integral y permanente de
                                    los seres humanos; la instrucción privilegia el desarrollo
                                    cognitivo, de las habilidades y destrezas con relación a saberes
                                    y haceres precisos. <br>
                                </p>

                            <b>b) La universidad</b>
                                <p style="text-align: justify">
                                    La universidad es una institución educativa superior y una
                                    comunidad académica que ha formado a las generaciones
                                    de profesionales y hombres responsables de dinamizar el
                                    conocimiento, la cultura y el desarrollo de los pueblos, de
                                    transformar la sociedad, aun a pesar de sus rasgos
                                    conservadoresque histórica y paradójicamente siempre ha
                                    mantenido. <br><br>

                                    Hoy más que nunca, la universidad está obligada cumplir un
                                    importante rol protagónico en los procesos de generación de
                                    conocimientos, de innovación tecnológica, de preparar a los
                                    hombres que deben liderar los cambios en los sistemas
                                    organizacionales y de la propia sociedad. <br>
                                </p>

                            <b>c) La pedagogía</b>
                                <p style="text-align: justify">
                                    La pedagogía es la ciencia social general de la educación
                                    que tiene por objeto de estudio a los complejos fenómenos
                                    educativos de los sujetos educables. Para ello se
                                    interrelaciona con las otras ciencias de la educación
                                    (psicopedagogía, neurociencia, sociología de la educación,
                                    antropología pedagógica, etc.) así como con otras ciencias
                                    relacionadas con los estudios del ser humano y sus procesos
                                    de formación integral y multidimensional de los seres
                                    humanos dentro de su interrelación con el mundo y lavida. <br><br>

                                    Como toda ciencia, la pedagogía ha tenido un proceso de
                                    largo desarrollo, dentro del cual se han destacado la existencia de diversos paradigmas, modelos y teorías que
                                    han servido para reflexionar sobre el sentido y la praxis de la
                                    educación, para analizar, comprender, valorar, diseñar,
                                    implementar y ejecutar los procesos de enseñanzaaprendizaje. Dentro del MOEDUNT se recogen los aportes de
                                    las pedagogías más importantes. <br><br>  

                                    De la pedagogía tradicional se rescata la capacidad del
                                    docente como maestro, como guía y depositario del saber
                                    (autoridad en su materia), además de la disciplina
                                    (responsabilidad) del estudiante,así como el privilegio de la
                                    memoria comprensiva como base para el proceso de
                                    información. <br><br>

                                    De la pedagogía activa se recupera el carácter dinámico y
                                    social de la educación, que incluye a la familia, institución
                                    educativa y comunidad en la formación de un nuevo
                                    hombre, libre, participativo, con capacidad de trabajo en
                                    equipo, solidario, líder y autónomo. Además, plantea al
                                    programa de estudios en bloques, en correspondencia al
                                    contexto y de acuerdo a las necesidades estudiantiles, y el
                                    énfasis en la evaluación cualitativae integral. <br><br>

                                    De la pedagogía tecnicista se retoman los conceptos de
                                    productividad, calidad, eficacia, eficiencia, competitividad
                                    como pilares fundamentales de la educación, el concepto
                                    de instrucción programada, usando herramientas
                                    tecnológicas, módulos de auto instrucción con objetivos
                                    claros, precisos y medibles (competencias tecnológicas). <br><br>

                                    De la pedagogía humanista se considera la visión del hombre
                                    en su complejidad, pero también en su individualidad, como
                                    un fin y no como un medio. Se busca formar seres autónomos,
                                    creativos, organizados, proactivos, responsables, en contra
                                    de la desigualdad, la opresión y la injusticia. <br><br>

                                    De la pedagogía libertaria se recoge el valor supremo de la
                                    educación en y para libertad, se subraya el principio de
                                    educar para abolir al ser humano de la más grande opresora:
                                    la ignorancia, y que solo con la educación se libera a la
                                    conciencia y al hombre mismo. Se pondera la relación
                                    horizontal y respetuosa entre maestro y estudiante para que
                                    este desarrolle su espíritu autónomo, crítico y libre. <br><br>

                                    De la pedagogía constructivista se asume las tesis de que el
                                    ser humano, tanto en lo cognitivo como en lo social y
                                    afectivo, es una construcción y reconstrucción propia y
                                    constante como resultadode la interacción dinámica entre
                                    esas dimensiones; y se reconoce; además, al entorno
                                    sociocultural como determinante del aprendizaje,
                                    moldeador del conocimiento y el comportamiento de los
                                    estudiantes. <br><br>

                                    De la pedagogía constructivista se asume las tesis de que el
                                    ser humano, tanto en lo cognitivo como en lo social y
                                    afectivo, es una construcción y reconstrucción propia y
                                    constante como resultadode la interacción dinámica entre
                                    esas dimensiones; y se reconoce; además, al entorno
                                    sociocultural como determinante del aprendizaje,
                                    moldeador del conocimiento y el comportamiento de los
                                    estudiantes. <br><br>

                                    De la pedagogía histórico-critica se asume las tesis de que es
                                    necesario transformar la realidad para lograr el bienestar del
                                    hombre y la sociedad; el ser humano no solo necesita librarse
                                    de la ignorancia sino también de la opresión y la pobreza. El
                                    maestro es un guía transformador, altamente competente,
                                    con gran calidad humana, generador de un clima
                                    emocional para el aprendizaje. El estudiante también es un
                                    agente de transformación, cuestionador, problematizador,
                                    de pensamiento divergente, sujeto de su propio aprendizaje,
                                    nadie puede liberarlosino él mismo pero integrado con su
                                    entorno social con el cual estáen interacción. El programa
                                    debe estar organizado con asignaturas que permitan pensar
                                    en forma creadora y estar en relación con su propia práctica,
                                    los contenidos van cambiando deacuerdo a los cambios de
                                    los estudiantes. El método debe ser problematizador, activo,
                                    cooperativo y colaborativo. La evaluación busca lo
                                    cualitativo, debe ser dinámica, evalúa el juicio crítico,
                                    plantea la autoevaluación, coevaluación y
                                    heteroevaluación con el propósito de que esta sea objetiva. <br><br>

                                    De la pedagogía de la complejidad de Edgar Morin se toma
                                    la tesis de la necesidad de formar un nuevo hombre que
                                    adquiera consciencia de su condición humana compleja,
                                    del proceso heteróclito del conocer, de la pertinencia del
                                    conocimiento, de su identidad terrenal, de las
                                    incertidumbres, de la comprensión y de la ética humana; y
                                    que esa toma de conciencia conlleve a la voluntad de
                                    consolidar la ciudadanía planetaria.
                                </p>    

                            @else
                                {{$base_general->concepcion_curricular}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>

            <form action="{{route('base_conceptuales.update3')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.4 Enfoque por competencias: </label>
                        <textarea name="enfoque_competencias" required>
                            @if (is_null($base_general->enfoque_competencias))
                            <b>a) Definición de competencia educativa</b>
                                <p style="text-align: justify">
                                    Es el desempeño complejo, integral e idóneo que
                                    compromete la interacción de diversas dimensiones
                                    humanas (motrices, cognitivas, afectivas y volitivas) para
                                    resolver los diversos problemas del mundo de la vida y del
                                    desempeño profesional, con autonomía, creatividad,
                                    criticidad, civismo, efectividad, conciencia ecológica,
                                    histórico-cultural y ética-moral. <br>
                                </p>

                            <b>b) Clasificación de las competencias</b>
                                <p style="margin-left: 40px"><b >b.1 Competencias Genéricas</b></p>
                                <p style="margin-left: 65px"><b >Características</b></p>
                                    <ul style="margin-left: 70px">
                                        <li>
                                            Son las que cualquier estudiante debe desarrollar y
                                            todo profesional poseer.
                                        </li>

                                        <li>
                                            Por su complejidad, se desarrollan de modo
                                            transversal entodos los cursos.
                                        </li>

                                        <li>
                                            Concretan la identidad institucional.
                                        </li>

                                        <li>
                                            Son definidas por las autoridades institucionales.
                                        </li>
                                    </ul>

                                <p style="margin-left: 40px"><b >b.2 Competencias específicas
                                </b></p>
                                <p style="margin-left: 65px"><b >Características</b></p>
                                    <ul style="margin-left: 70px">
                                        <li>
                                            Son comunes a todos los estudiantes que comparten
                                            la profesión.
                                        </li>

                                        <li>
                                            Dan base epistemológica, científica y tecnológica
                                            a la profesión
                                        </li>

                                        <li>
                                            Exclusivas para estudiantes de cada carrera
                                            profesional.
                                        </li>

                                        <li>
                                            Buscan dar lo propio de la profesión.
                                        </li>

                                        <li>
                                            Permiten desarrollar todos los conocimientos,
                                            destrezas, actitudes y metodologías indispensables
                                            para el buen desempeño profesional.
                                        </li>

                                        <li>
                                            Son definidas por el estamento docente de cada
                                            especialidad, carrera profesional de acuerdo al nivel
                                            de estudios de pregrado y posgrado.
                                        </li>
                                    </ul>
                            @else
                                {{$base_general->concepcion_curricular}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>

            <form action="{{route('base_conceptuales.update3')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.5 Modalidad de estudios (presencialidad y manejo de la virtualidad): </label>
                        <textarea name="modalidad_estudio" required>
                            @if (is_null($base_general->modalidad_estudio))
                                
                            @else
                                {{$base_general->concepcion_curricular}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>

            <form action="{{route('base_conceptuales.update3')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.6 Concepción curricular: </label>
                        <textarea name="concepcion_curricular" required>
                            @if (is_null($base_general->concepcion_curricular))
                                <p style="text-align: justify">El currículo es un instrumento teórico y operativo, en el cual se plasma una concepción filosófica
                                    educativa (antropológica, ontológica, mesológica y teleológica educativa), científica y técnica
                                    acerca de la educación formal en la Universidad Nacional de Trujillo. <br>
                                    Se asume un currículo integral, humanístico, flexible e histórico crítico (que forme pensamiento
                                    dialéctico, propositivo, autónomo y complejo), sociocultural (que integre a la universidad con la
                                    sociedad y sus diferentes agentes para plantear alternativas de desarrollo social y cultural),
                                    intercultural e inclusivo (que posibilite un diálogo entre culturas para revalorar la identidad regional
                                    y nacional y asumir de manera crítica y consciente los aportes científicos, culturales y tecnológicos
                                    del entorno global) y por competencias (mediante procesos complejos e idóneos de desempeño
                                    ante determinadas situaciones, comprometan la actuación e interacción de las diversas
                                    dimensiones del ser humano y contextualizado a la construcción de un proyecto de vida,
                                    comunidad y país.</p>
                            @else
                                {{$base_general->concepcion_curricular}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>

            <form action="{{route('base_conceptuales.update3')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>3.1.3.7 Ejes curriculares transversales y propios del programa profesional: </label>
                        <textarea name="ejes_curriculares" required>
                            @if (is_null($base_general->ejes_curriculares))
                               
                            @else
                                {{$base_general->concepcion_curricular}}
                            @endif
                        </textarea>
                    </div>
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
            </form><br>
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
                        <p>Constituyen el soporte filosófico, científico y técnico que le da consistencia, orientación y
                            sentido al currículo (en general, deben ser transcritos y/o adecuados de lo planteado en el
                            MOEDUNT-2, contextualizados al currículo)</p>
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
    CKEDITOR.config.height  = 200;
    CKEDITOR.replace('concepcion_humano');
    CKEDITOR.replace('concepcion_episte');
    CKEDITOR.replace('concepcion_pedagogica');
    CKEDITOR.replace('enfoque_competencias');
    CKEDITOR.replace('modalidad_estudio');
    CKEDITOR.replace('concepcion_curricular');
    CKEDITOR.replace('ejes_curriculares');
</script>
@endsection