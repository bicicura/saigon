<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-3 gap-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('castings', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8" ><path d="m7 8 3.7 7.6h6.5L13.5 8h4.45l3.7 7.6h6.5L24.45 8h4.45l3.7 7.6h6.5L35.4 8H41q1.2 0 2.1.9.9.9.9 2.1v26q0 1.2-.9 2.1-.9.9-2.1.9H7q-1.2 0-2.1-.9Q4 38.2 4 37V11q0-1.2.9-2.1Q5.8 8 7 8Zm0 10.6V37h34V18.6Zm0 0V37Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Castings</h3>
                    <h4 class="tracking-tight text-gray-500">Posted</h4>
                </div>
            </a>
            <a href="{{ route('dashboard.inbox', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8" ><path d="M9 42q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6h30q1.2 0 2.1.9.9.9.9 2.1v30q0 1.2-.9 2.1-.9.9-2.1.9Zm15-8.65q1.9 0 3.625-1.125T30.5 29.2H39V9H9v20.2h8.5q1.15 1.9 2.875 3.025T24 33.35ZM9 32.2V39h30v-6.8h-7.1q-1.3 1.9-3.4 3.025-2.1 1.125-4.5 1.125t-4.5-1.125Q17.4 34.1 16.1 32.2ZM9 39h30H9Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Inbox</h3>
                    <h4 class="tracking-tight text-gray-500">Posted</h4>
                </div>
            </a>
            <a href="{{ route('dashboard.management', app()->getLocale()) }}" class="flex gap-3 p-6 transition-all bg-white border-b border-gray-200 shadow-sm cursor-pointer sm:rounded-lg h-96 hover:-translate-y-3 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-8 h-8"><path d="M5 38q-1.2 0-2.1-.9Q2 36.2 2 35V13q0-1.2.9-2.1.9-.9 2.1-.9h22q1.2 0 2.1.9.9.9.9 2.1v22q0 1.2-.9 2.1-.9.9-2.1.9Zm0-5.6q2.45-1.6 5.275-2.4 2.825-.8 5.725-.8 2.9 0 5.725.8 2.825.8 5.275 2.4V13H5ZM35 38V10h3v28Zm8 0V10h3v28ZM16 26.55q-2.3 0-3.925-1.625T10.45 21q0-2.3 1.625-3.925T16 15.45q2.3 0 3.925 1.625T21.55 21q0 2.3-1.625 3.925T16 26.55ZM6.5 35h19q-2.15-1.45-4.6-2.125-2.45-.675-4.9-.675-2.65 0-5.05.675T6.5 35ZM16 23.9q1.2 0 2.05-.825.85-.825.85-2.075 0-1.2-.85-2.05-.85-.85-2.05-.85-1.25 0-2.075.85-.825.85-.825 2.05 0 1.25.825 2.075.825.825 2.075.825ZM16 35Zm0-14Z"/></svg>
                <div>
                    <h3 class="text-2xl font-bold leading-7 text-black">Management</h3>
                    <h4 class="tracking-tight text-gray-500">Posted</h4>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
