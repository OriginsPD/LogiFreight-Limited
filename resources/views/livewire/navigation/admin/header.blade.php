<div x-data="{ isLogout: false }"
    class="border-b z-30 border-gray-100 sticky
      top-0 shadow bg-gray-900">

    <div class="flex items-center justify-between h-16 px-4 mx-auto screen-2xl sm:px-6 lg:px-8">

        <div class="flex items-center justify-between space-x-4">

            <div class="mt-1">
                <button @click.prevent="isSlide = !isSlide" class="flex  flex-shrink-0">

                    <i class="fas fa-bars text-white"></i>

                </button>
            </div>

            <div>

                    <span
                        class="text-2xl text-white italic font-extrabold tracking-widest uppercase rounded-lg">

                        {{ config('app.name') }}

                    </span>

            </div>

            <nav @click.prevent="isSlide = false"
                class="items-end absolute  right-4 mr-6 justify-end pl-8 ml-8 text-sm font-medium space-x-2 md:flex">

                <div class="hidden space-x-2 lg:block">

                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg

                     hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 shadow "

                       href="#">

                        <i class="far fa-exclamation-square text-green-500 pr-1"></i>

                        QuickAlerts

                    </a>

                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg

                     hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 shadow "

                       href="#">

                        Profile

                    </a>

                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg

                     hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 shadow "

                       href="#">

                        Setting

                    </a>

                    <a @click.prevent="isLogout = true" class="px-4 py-2 mt-2 text-sm font-semibold bg-red-600 rounded-lg

                     text-white italic focus:text-white hover:bg-red-700 shadow "

                       href="#">

                        <i class="far fa-sign-out-alt"></i>


                    </a>

                </div>

                <div class="sm:flex  md:flex lg:hidden">



                </div>

            </nav>

        </div>

    </div>

    <div :class="isLogout ? 'translate-y-0' : '-translate-y-96 opacity-80'"
        class="p-8 fixed h-48 mx-auto transition transform duration-500 inset-0 w-5/12 bg-white rounded-b-lg shadow-2xl">

        <h2 class="text-lg font-bold">Are you sure you want to do that?</h2>

        <p class="mt-2 text-sm text-gray-500">
            Are you sure you want to ended your session
        </p>

        <div class="flex items-center bg-white justify-end mt-8 text-xs">

            <button wire:click.prevent="logout"
                type="button" class="px-4 py-2 font-medium text-white rounded bg-green-400">

                Yes, I'm sure

            </button>

            <button @click="isLogout = false"
                type="button" class="px-4 py-2 ml-2 font-medium text-gray-600 rounded bg-gray-50">

                No, go back

            </button>

        </div>

    </div>


</div>

