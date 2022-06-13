<div
style="display: none"
wire:ignore 
x-show="deleteModal"
x-transition:enter.duration.300ms
x-transition:leave.duration.150ms
@keyup.window="deleteModal = false" 
class="fixed top-0 left-0 flex items-center justify-center w-full min-h-screen"
>
    <div class="w-full max-w-lg p-8 space-y-6 bg-white border border-gray-200 rounded-xl drop-shadow-md" @click.away="deleteModal = false">
        <div class="absolute -top-6 -right-6" @click="deleteModal = false">
            <button type="button" class="flex items-center justify-center w-12 h-12 text-white transition duration-150 ease-in-out bg-gray-300 rounded-full hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="rotate-45" width="16" height="17" viewBox="0 0 24 24"><path fill="#000" d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
            </button>
        </div>
        <h2 class="text-xl font-bold">Estas por eliminar el perfil de <span x-text="perfilNombre"></span>.</h2>
        <div class="space-y-4 text-gray-600">
            <p>Una vez eliminado un perfil, se procede a borrar todo su contenido. Esto incluye su información e imágenes.</p>
        </div>
        <div class="flex gap-6 ml-auto text-white w-max">
            <button @click="deleteModal = false" class="px-6 py-2 text-black transition ease-in-out bg-indigo-300 rounded-md hover:bg-indigo-900 durantion-150 hover:text-white">Cancelar</button>
            <button wire:click="deleteProfile" class="px-6 py-2 font-bold transition ease-in-out bg-red-600 rounded-md hover:bg-red-900 durantion-150">Eliminar</button>
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-70 -z-10"></div>
</div>