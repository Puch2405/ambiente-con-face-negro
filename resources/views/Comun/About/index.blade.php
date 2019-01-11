@extends("Layouts.layout")

@section('Titulo')
    Acerca De
@endsection

@section('active_about')
    active
@endsection


@section('Seccion')
     <div class=" col s10 offset-s1">
        <h1 class="thin red-text text-lighten-1 center ">AMBIENTE CIELO ROJO</h1>
    </div>

    <div class="row">
        <h3 class="thin red-text text-lighten-1 center col s12 m12 l12 xl12">Cine, ciencia y multimedia para la cultura y el ambiente.</h3>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                Somos una organización de nueva generación multidisciplinaria, que busca generar investigación y transmitirla a diversos
                actores y públicos por medio del audiovisual y estrategias multimedia en materia de patrimonio biocultural, experiencias
                de conservación y defensa del patrimonio natural y la biodiversidad, entre otros.
            </p>
        </div>
        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                Combinamos una sólida investigación científica, con el trabajo artístico cinematográfico y multimedia para generar materiales
                originales, de alta calidad, con una visión intercultural y de divulgación teniendo como base una perspectiva latinoamericana de
                los conflictos ambientales enmarcándolos en la crisis ambiental global.
            </p>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <img class="materialboxed responsive-img" width="650" src="{{asset('Photos/equipo_entrevista.jpg')}}">
        </div>

        <div class="col s12 m12 l12 xl12">
            <h3 class="thin red-text text-lighten-1 center">Mision:</h3>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                Generar investigación y productos de comunicación escrita, gráfica y audiovisual que promuevan una conciencia hacia el ambiente y el
                patrimonio cultural de México y Latinoamérica para el impulso de una sociedad más armónica.
            </p>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <img class="materialboxed responsive-img" width="650" src="{{asset('Photos/18.jpg')}}">
        </div>

        <div class="col s12 m12 l12 xl12">
            <h3 class="thin red-text text-lighten-1 center">Vision:</h3>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                Un equipo multidisciplinario consolidado con experiencia y éxito en el desarrollo de proyectos de comunicación audiovisual,
                multimedia e investigación con reconocimiento como una empresa promotora de la conservación y fomento del patrimonio
                cultural y natural de la región de Valle de Bravo, pero también a nivel nacional e internacional; social y ambientalmente responsable.
            </p>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <img class="materialboxed responsive-img" width="650" src="{{asset('Photos/24.jpg')}}">
        </div>

        <div class="col s12 m12 l12 xl12">
            <h3 class="thin red-text text-lighten-1 center">Servicios:</h3>
        </div>

        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                Empresa mexicana comprometida con la justicia social y la conservación ambiental que apoya iniciativas de defensa,
                preservación y gestión sustentable del patrimonio ecológico y cultural. Esto lo logramos mediante la realización de videos virales,
                cortos y largometrajes, fotografía, fotografía aérea, video 360ª, crowdfunding, estudios científicos y tecnológicos, gestión ambiental,
                divulgación científica y capacitación.
            </p>
        </div>

        <div class="col s12 m12 l12 xl12">
            <h3 class="thin red-text text-lighten-1 center">Nuestros objetivos son:</h3>
        </div>
        <div class="col s10 m6 l6 xl6 offset-s1 offset-m3 offset-l3 offset-xl3">
            <p align="justify">
                *Producción de películas cinematográficas y videos.<br>
                *Difusión multimedia: plataformas virtuales y cine móvil en las comunidades.<br>
                *Brindar servicios de investigación y desarrollo en ciencias sociales y humanidades.<br>
                *Servicios de consultoría científica y técnica.
            </p>
        </div>

        <div class="col s12 m12 l12 xl12">
            <h3 class="thin red-text text-lighten-1 center">Equipo de Trabajo</h3>
        </div>
        @forelse($abouts as $ab)
            <div class="col s12 m4 l3 xl3" style="height: 600px;">
                <div class="card">
                    <div class="card-image">
                        <img class="responsive-img" src="{{env('APP_URL')}}/{{$ab->archivo}}">

                    </div>
                    <div class="card-content">
                        <span class="card-title thin red-text text-lighten-1">{{$ab->nombre}}</span>
                        <p>{{$ab->descripcion}}</p>
                    </div>
                </div>
            </div>
        @empty
    </div>
    <h1>No hay datos</h1>
    @endforelse
    <div class="col s11 offset-s1">
        <h3 class="thin red-text text-lighten-1 left">Sustentabilidad</h3>
    </div>
    <div class="col s6 offset-s1">
        <p align="justify">
            En ecología, sostenibilidad describe cómo los sistemas biológicos se mantienen diversos y productivos con el transcurso del tiempo.
            Se refiere al equilibrio de una especie con los recursos de su entorno.
        </p>
    </div>
    <div class="col s11">
        <h3 class="thin red-text text-lighten-1 right">Equilibrio</h3>
    </div>

    <div class="col s6 offset-s5">
        <p align="justify">
            Relación entre dos o más cosas que permite que ninguna de ellas prevalezca sobre las otras.
            Proporción adecuada en la distribución de los elementos constitutivos de una cosa.
            Estabilidad de una cosa sometida a influencias diversas, a menudo opuestas, que están en la proporción adecuada para contrarrestarse.
        </p>
    </div>
    </div>
@endsection