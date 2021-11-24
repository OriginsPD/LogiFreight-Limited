@props([
    'title' => false
])
<div x-data="{ isDrop: false }"
    class="relative inline-block   w-full mt-2">

    <!-- Dropdown toggle button -->
    <button @click.prevent="isDrop = !isDrop"
            :class="isDrop ? 'translate-y-0 ease-out' : '-translate-y-full ease-in'"
        class="relative px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg
                hover:text-gray-900 focus:text-gray-900 hover:bg-gray-500 focus:bg-gray-500
                  focus:outline-none focus:shadow-outline">

        <div class="flex text-white"> {{ $title }}

            <svg
                :class="isDrop ? 'transform transition duration-500 rotate-180' : 'transform transition duration-500 rotate-0' "
                class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                      fill="currentColor"></path>
            </svg>
        </div>
    </button>

    <!-- Dropdown menu -->
    <div x-show="isDrop"
         x-transition:enter="transition ease-out duration-100"

         x-transition:enter-start="transform opacity-0 scale-95"

         x-transition:enter-end="transform opacity-100 scale-100"

         x-transition:leave="transition ease-in duration-75"

         x-transition:leave-start="transform opacity-100 scale-100"

         x-transition:leave-end="transform opacity-0 scale-95"

         :class="isDrop ? 'translate-y-0 ease-out' : '-translate-y-full ease-in'"
        class="relative right-0 z-20 w-full transform duration-200 static translate-y-0 mt-1
               overflow-hidden bg-transparent rounded-md dark:bg-gray-800">

        {{ $slot }}

    </div>
</div>
