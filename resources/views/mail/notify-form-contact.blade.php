<x-simple-email-content>
    <h3>Consulta del formulario de contacto</h3>
    <p>
        Usuario: {{$data['name']}}
    </p>
    <p>
        Email: {{$data['email']}}
    </p>
    <p>
        Asunto: {{$data['subject']}}
    </p>
    <p>
        Mensaje: 
    </p>
    <p>
        {{$data['message']}}
    </p>
 </x-simple-email-content>