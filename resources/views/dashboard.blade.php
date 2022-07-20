<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard — Saigón') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('castings', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8" ><path d="m7 8 3.7 7.6h6.5L13.5 8h4.45l3.7 7.6h6.5L24.45 8h4.45l3.7 7.6h6.5L35.4 8H41q1.2 0 2.1.9.9.9.9 2.1v26q0 1.2-.9 2.1-.9.9-2.1.9H7q-1.2 0-2.1-.9Q4 38.2 4 37V11q0-1.2.9-2.1Q5.8 8 7 8Zm0 10.6V37h34V18.6Zm0 0V37Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Castings</h3>
                    <h4 class="text-sm italic tracking-tight text-gray-500">Comerciales / Ficción / Fotografía / Mini</h4>
                </div>
            </a>
            <a href="{{ route('dashboard.productoras', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8" ><path d="M7 40q-1.2 0-2.1-.9Q4 38.2 4 37V11q0-1.2.9-2.1Q5.8 8 7 8h26q1.2 0 2.1.9.9.9.9 2.1v10.75l8-8V34.2l-8-8V37q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h26V11H7v26Zm4.6-4.9h16.8v-1.05q0-3.15-2.95-4.05-2.95-.9-5.45-.9t-5.45.9q-2.95.9-2.95 4.05Zm8.4-8.75q1.75 0 2.875-1.125T24 19.35q0-1.75-1.125-2.875T20 15.35q-1.75 0-2.875 1.125T16 19.35q0 1.75 1.125 2.875T20 23.35ZM7 37V11v26Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Productoras</h3>
                    <h4 class="text-sm italic tracking-tight text-gray-500">Administrar Productoras</h4>
                </div>
            </a>
            <a href="{{ route('dashboard.management', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8"><path d="M5 38q-1.2 0-2.1-.9Q2 36.2 2 35V13q0-1.2.9-2.1.9-.9 2.1-.9h22q1.2 0 2.1.9.9.9.9 2.1v22q0 1.2-.9 2.1-.9.9-2.1.9Zm0-5.6q2.45-1.6 5.275-2.4 2.825-.8 5.725-.8 2.9 0 5.725.8 2.825.8 5.275 2.4V13H5ZM35 38V10h3v28Zm8 0V10h3v28ZM16 26.55q-2.3 0-3.925-1.625T10.45 21q0-2.3 1.625-3.925T16 15.45q2.3 0 3.925 1.625T21.55 21q0 2.3-1.625 3.925T16 26.55ZM6.5 35h19q-2.15-1.45-4.6-2.125-2.45-.675-4.9-.675-2.65 0-5.05.675T6.5 35ZM16 23.9q1.2 0 2.05-.825.85-.825.85-2.075 0-1.2-.85-2.05-.85-.85-2.05-.85-1.25 0-2.075.85-.825.85-.825 2.05 0 1.25.825 2.075.825.825 2.075.825ZM16 35Zm0-14Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Management</h3>
                    <h4 class="text-sm italic tracking-tight text-gray-500">Gestionar perfil de actores</h4>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
