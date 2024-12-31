

<footer class="bg-white shadow" x-data="
    {
        page: '', 
        endpoint: '',
        open: false,
        content: '',

        pageContent(page, endpoint){
            
            fetch(endpoint)
                .then(response => response.text())
                .then(html =>{
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const container = doc.getElementById('content-page');
                    const htmlContent = container.innerHTML;
                    this.content = htmlContent;
                    //console.log(text);

                    this.open = true;
                    this.page = page;
                    this.endpoint = endpoint;
                })
        }
    }">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                <li>
                    <a x-on:click="pageContent('Sobre nosotros', '/sobre-nosotros')" class="hover:underline me-4 md:me-6 cursor-pointer">Sobre nosotros</a>
                </li>
                <li>
                    <a x-on:click="pageContent('Política de privacidad', '/politica-de-privacidad')" class="hover:underline me-4 md:me-6 cursor-pointer">Política de privacidad</a>
                </li>
                <li>
                    <a x-on:click="pageContent('Términos y condiciones', '/terminos-y-condiciones')" class="hover:underline me-4 md:me-6 cursor-pointer">Términos y Condiciones</a>
                </li>
                <li>
                    <a href="{{route('pages.contacto')}}" class="hover:underline cursor-pointer">Contacto</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center">© {{now()->format('Y')}} <a href="/" class="hover:underline">{{ config('app.name') }}™</a>. Todos los derechos reservados.</span>
    </div>

    <!--Modal-->
    <x-modal-pages-footer x-model="page"></x-modal-pages-footer>
</footer>
