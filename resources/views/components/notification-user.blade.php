<div class="fixed top-0 flex items-end justify-center w-full px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-60">
    <div
        x-cloak
        x-data="{ show: false, message: '', status: ''}"
        x-on:notify.window="show = true; message = $event.detail.message; status = $event.detail.status; setTimeout(() => { show = false }, 7000)"
        x-show="show"
        x-description="Notification, show/hide based on alert state."
        x-transition:enter.duration.300ms
        x-transition:leave.duration.200ms
        :class="status === 'success'? 'bg-green-300 text-black' : 'bg-red-300'"
        class="w-full max-w-sm mr-10 border border-black shadow-lg pointer-events-auto lg:border-2"
    >
        <div class="overflow-hidden rounded-lg shadow-md">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">


                        <svg x-show="status == 'error'" class="w-6 h-6" viewBox="0 0 48 48"><path d="M24 34q.7 0 1.175-.475.475-.475.475-1.175 0-.7-.475-1.175Q24.7 30.7 24 30.7q-.7 0-1.175.475-.475.475-.475 1.175 0 .7.475 1.175Q23.3 34 24 34Zm-1.35-7.65h3V13.7h-3ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 23.95q0-4.1 1.575-7.75 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24.05 4q4.1 0 7.75 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm.05-3q7.05 0 12-4.975T41 23.95q0-7.05-4.95-12T24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24.05 41ZM24 24Z"/></svg>
                        
                        <svg x-show="status == 'success'" class="w-6 h-6" viewBox="0 0 48 48"><path d="M21.05 33.1 35.2 18.95l-2.3-2.25-11.85 11.85-6-6-2.25 2.25ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.8 1.575-3.65 4.3-6.35 2.725-2.7 6.375-4.275Q19.9 4 24 4q4.15 0 7.8 1.575 3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.275 6.375t-6.35 4.3Q28.15 44 24 44Zm0-3q7.1 0 12.05-4.975Q41 31.05 41 24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.05 0-12.025 4.95Q7 16.9 7 24q0 7.05 4.975 12.025Q16.95 41 24 41Zm0-17Z"/></svg>

                    </div>
                    <div class="flex-1 w-0 ml-3">
                        <p x-text="message" class="text-base saigon-font-semibold"
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

