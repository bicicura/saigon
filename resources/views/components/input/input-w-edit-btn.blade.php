<div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
    <div class="block text-sm font-semibold leading-5 text-gray-700">
        {{$label}}
    </div>

    <div class="mt-2 sm:mt-0 sm:col-span-2"">
        <div class="flex items-center">
            <span class="rounded-md shadow-sm">
                <a href="{{ route('dashboard.management-edit-book', [app()->getLocale(), $id]) }} ">
                    <div class="px-3 py-2 text-sm font-semibold leading-4 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 active:bg-gray-50 active:text-gray-800">
                        Editar
                    </div>
                </a>
            </span>
        </div>
    </div>
</div>