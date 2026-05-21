<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-md-7 col-sm-12 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <!-- Controles -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div style="display:flex; flex-wrap:wrap;">
                        <div class="mb-2 col-12" style="display:flex; flex-wrap:wrap;">
                            Está seguro de que quiere eliminar?
                        </div>
                    </div>
                </div>
                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <div class="flex justify-center">
                        <!-- Desde 640 en adelante -->
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        <button wire:click="confirmDelete({{ $itemToDelete }})" type="button" class="bg-red-300 hover:bg-red-400 inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 text-base leading-6 font-bold text-gray-900 shadow-sm focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Eliminar
                        </button>
                    </span>
{{--
                        <button wire:click="delete({{ $itemToDelete }})" class="hidden lg:flex bg-red-300 hover:bg-red-400 text-black-900 font-bold py-1 px-4 rounded mt-1w">
                        </button> --}}
                    </div>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="$set('showDeleteModal',false)" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-900 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                    {{-- <x-cerrar></x-cerrar> --}}
                </div>
            </form>
        </div>
    </div>
</div>

