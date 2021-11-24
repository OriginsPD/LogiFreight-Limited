<div x-data="{ isSlide: false, isLogin: false }"
     @keydown.esc.window="isSlide = false"
     @click.away.window="isSlide = false"
    class="w-screen">

    <x-navigation
        end="1" center="1">
        <x-slot name="mid">

            <x-navigation.center class="text-white">

                Services

            </x-navigation.center>

                <x-dropdown.links class="text-white" title="Shipping Agents">

                    <x-dropdown.href > link 1 </x-dropdown.href>
                    <x-dropdown.href > link 1 </x-dropdown.href>
                    <x-dropdown.href > link 1 </x-dropdown.href>

                </x-dropdown.links>

            <x-navigation.center class="text-white">

                Pick Up Times

            </x-navigation.center>

            <x-navigation.center class="text-white">

                About Us

            </x-navigation.center>

        </x-slot>

        <x-slot name="end">

            <x-navigation.end @click.prevent="isLogin = !isLogin" class="text-white hover:underline">

                Login

            </x-navigation.end>

        </x-slot>


    </x-navigation>

    <div
        :class="isSlide ? 'translate-x-0' : 'translate-x-96'"
        class="w-72 absolute transform z-10  transition duration-300 right-0 top-0 h-screen bg-white lg:hidden xl:hidden md:hidden ">

        <button

            @click="isSlide = !isSlide"
            class="p-2 absolute right-5 text-gray-600  hover:bg-gray-200 m-2 bg-opacity-50 rounded" type="button">

            <span class="sr-only">Open menu</span>

            <svg
                width="24"
                height="24"
                class="w-5 h-5 text-black hover:text-red-700"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z"
                    fill="currentColor"
                />
            </svg>

        </button>

        <nav class="my-10">

           <div class="p-3">

               @livewire('auth.login')

           </div>

        </nav>

    </div>

    <x-modal alpName="isLogin" class="flex bg-gray-900 bg-opacity-80">

        @livewire('auth.login')

    </x-modal>

</div>
