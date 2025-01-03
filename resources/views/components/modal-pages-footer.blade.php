
{{-- @props(['page']) --}}

<div x-cloak x-data="{

    init(){
        open = false

    },
    cerrar(){
        open = !open

    },
}" class="flex justify-center">
    
  <!-- Main modal -->
  <div x-show="open = open" id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" {{$attributes->merge(['class' => 'flex overflow-x-hidden fixed top-0 z-50 justify-center items-center '])}}>
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow opacity-100 h-[600px] overflow-y-auto">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-xl font-semibold text-gray-900" x-text="page">
                      
                  </h3>
                  <button x-on:click="cerrar()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5 space-y-4 ">
                 <!--aqui el texto de la pagina-->
                 <div class="w-full" >
                    <div x-html="content"></div>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                  <button x-on:click="cerrar()" data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cerrar</button>
              </div>
          </div>
      </div>
      
  </div>

  <div x-show="open" x-on:click="cerrar()" class="bg-gray-900/50 fixed inset-0 z-40"></div>
</div>
