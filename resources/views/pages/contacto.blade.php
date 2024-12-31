<x-app-layout>

<!--banner header-->
<div class="banner mt-1 w-full aspect-[3/1] bg-no-repeat bg-cover bg-center h-[350px] md:h-[450px] flex flex-col justify-center mb-[300px]" 
    style="background-image: url({{asset('img/img-categorias.webp')}});">
    <x-container class="flex justify-end mt-[500px]">
  
            <div class="card-form">
                <div class="bg-white shadow-lg rounded-md px-6 py-6 w-full sm:w-[400px]">
                    <div class="card-title">
                        <h2 class="font-semibold text-2xl">
                            Formulario de Contacto
                        </h2>
                    </div>
                    <div class="card-body pt-4" id="content-page">
                        <form action="{{route('pages.sendFormContact')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <x-label class="w-full mb-1">Nombre</x-label>
                                @if (Auth::check())
                                    <x-input class="w-full bg-gray-200" name="name" value="{{Auth::user()->name}}" readonly></x-input>
                                @else
                                    <x-input class="w-full" name="name"></x-input>
                                    <x-input-error for="name"></x-input-error>
                                @endif
                            </div>

                            <div class="mb-3">
                                <x-label class="w-full mb-1">Email</x-label>
                                @if (Auth::check())
                                    <x-input class="w-full bg-gray-200" name="email" value="{{Auth::user()->email}}" readonly></x-input>
                                @else
                                    <x-input class="w-full" name="email"></x-input>
                                    <x-input-error for="email"></x-input-error>
                                @endif
                                
                            </div>

                            <div class="mb-3">
                                <x-label class="w-full mb-1">Asunto</x-label>
                                <x-input class="w-full" name="subject"></x-input>
                                <x-input-error for="subject"></x-input-error>
                            </div>

                            <div class="mb-3">
                                <x-label class="w-full mb-1">Mensaje</x-label>
                                <x-textarea class="w-full" name="message"></x-textarea>
                                <x-input-error for="message"></x-input-error>
                            </div>

                            <div class="mb-3">
                                <x-button>Enviar</x-button>
                            </div>
                        </form>
                    </div>
                </div>    
            </div>

    </x-container>
</div>

</x-app-layout>