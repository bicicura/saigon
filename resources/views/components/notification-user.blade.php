<div class="fixed top-0 flex items-end justify-center w-full px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-60">
    <div
        x-cloak
        x-data="{ show: false, message: '', status: ''}"
        x-on:notify.window="show = true; message = $event.detail.message; status = $event.detail.status; setTimeout(() => { show = false }, 5000)"
        x-show="show"
        x-description="Notification, show/hide based on alert state."
        x-transition:enter.duration.300ms
        x-transition:leave.duration.200ms
        :class="status === 'success'? 'bg-white text-black' : 'bg-red-300'"
        class="w-full max-w-sm mr-10 border border-black shadow-lg pointer-events-auto lg:border-2"
    >
        <div class="overflow-hidden rounded-lg shadow-md">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">


                        <svg  x-show="status == 'error'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 28 28"><path d="M7 4c-.25587 0-.51203.09747-.70703.29297l-2 2c-.391.391-.391 1.02406 0 1.41406L11.58594 15l-7.29297 7.29297c-.391.391-.391 1.02406 0 1.41406l2 2c.391.391 1.02406.391 1.41406 0L15 18.41406l7.29297 7.29297c.39.391 1.02406.391 1.41406 0l2-2c.391-.391.391-1.02406 0-1.41406L18.41406 15l7.29297-7.29297c.391-.39.391-1.02406 0-1.41406l-2-2c-.391-.391-1.02406-.391-1.41406 0L15 11.58594 7.70703 4.29297C7.51153 4.09747 7.25588 4 7 4z"/></svg>

                        <svg x-show="status == 'success'"
                        class="w-6 h-6" fill="none" viewBox="0 0 24 24">  
                            <path stroke-linecap="round" stroke-linejoin="round" stroke="#FFF" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p x-text="message" class="text-sm tracking-wide ff-helvetica-400"
                        :class="status === 'wishlist'? 'text-white' : 'text-black'"
                        ></p>
                    </div>
                    <div class="flex flex-shrink-0 ml-4">
                        <button x-on:click="show = false"
                        class="inline-flex transition duration-150 ease-in-out focus:outline-none focus:text-gray-600"
                        :class="status === 'wishlist'? 'text-white' : 'text-black'"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                            >
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

