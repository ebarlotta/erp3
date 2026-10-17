<div>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" style="background-color: beige; ">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle col-8 sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
                <!-- Controles -->
                
                
                


                <!-- Botones -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    
                    
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <a href="<?php echo e(URL::to('/admin/pdf/informes')); ?>" target="_blank">
                        

                            
                            <button class="btn btn-warning">
                                PDF
                            </button>
                        </a>
                        <a href="<?php echo e(URL::to('/test')); ?>" target="_blank">
                            
    
                                
                                <button class="btn btn-warning">
                                    PDF Test
                                </button>
                            </a>
                        <button wire:click="showPDF()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-green-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            PDF wire
                        </button>
                        <button wire:click="closeModalInformeEspecifico()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-yellow-300 text-base leading-6 font-bold text-gray-700 shadow-sm hover:bg-yellow-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cerrar
                        </button>
                    </span>
                </div>
            
        </div>
    </div>
</div>

<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/geri/actores/informessociales.blade.php ENDPATH**/ ?>