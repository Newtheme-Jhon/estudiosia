<x-app-layout>
    <x-container>
        <div class="card mt-8 pt-4 pb-6">
            <h2 class="font-kumb text-3xl mb-3">
                Sobre Nosotros
            </h2>

            <div class="text-gray-700" id="content-page">
                <p class="font-semibold pb-2 text-xl">
                    "{{env('APP_NAME')}}: Tu plataforma para aprender, crear y crecer"
                </p>

                <p class="font-semibold mb-4 underline">
                    ¿Por qué {{env('APP_NAME')}}?
                </p>
                <p>
                    En un mundo donde el aprendizaje es constante y la demanda de nuevas 
                    habilidades crece exponencialmente, nos dimos 
                    cuenta de que faltaba un eslabón clave en las plataformas educativas tradicionales. 
                    Los estudiantes, tras adquirir conocimientos a través de cursos, anhelaban un espacio 
                    para poner en práctica lo aprendido y compartir sus proyectos con el mundo. Los profesores, 
                    por su parte, buscaban una forma más directa de llegar a sus alumnos y monetizar 
                    sus conocimientos más allá de los cursos.
                </p>
                <p class="mb-4">
                    {{env('APP_NAME')}} nació para responder a estas necesidades. 
                    Somos una plataforma que va más allá de la simple transmisión de conocimientos. 
                    Creemos en un aprendizaje activo y colaborativo, donde los estudiantes 
                    no solo consumen información, sino que también la crean y comparten.
                </p>

                <p class="font-semibold mb-4 underline">
                    Nuestra visión:
                </p>
                <p class="mb-4">
                    Queremos construir una comunidad global de aprendizaje donde todos tengan la oportunidad 
                    de crecer y desarrollarse. Un espacio donde los estudiantes puedan convertirse en 
                    creadores y los profesores puedan construir carreras sólidas.
                </p>

                <p class="font-semibold mb-4 underline">
                    ¿Qué nos hace diferentes?
                </p>
                <p>
                    <ul class="list-disc ml-4">
                        <li><b>Un ecosistema completo:</b> No solo ofrecemos cursos, sino también una plataforma para que los estudiantes muestren sus proyectos y los profesores vendan sus libros y servicios.</li>
                        <li><b>Fomento de la comunidad:</b> Creemos en el poder de la colaboración. Nuestra plataforma fomenta la interacción entre estudiantes, profesores y profesionales de diversas áreas.</li>
                        <li><b>Flexibilidad:</b> Aprende a tu propio ritmo y desde cualquier lugar. Nuestra plataforma se adapta a tus necesidades y objetivos.</li>
                    </ul>
                </p>

                <p class="font-semibold mb-4 mt-4 underline">
                    Nuestros valores:
                </p>
                <p>
                    <ul class="list-disc ml-4">
                        <li><b>Innovación:</b> Estamos siempre buscando nuevas formas de mejorar la experiencia de aprendizaje.</li>
                        <li><b>Empoderamiento:</b> Creemos en el potencial de cada individuo para alcanzar sus metas.</li>
                        <li><b>Accesibilidad:</b> Queremos que la educación de calidad esté al alcance de todos.</li>
                    </ul>
                </p>
                <p class="mt-4">
                    Únete a nuestra comunidad y descubre el futuro de la educación.
                </p>
            </div>
        </div>
    </x-container>
</x-app-layout>