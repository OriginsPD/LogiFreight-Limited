<div x-data="{ isLogout: false, isQuick: false, isProfile: false }"
     x-on:close-modal.window="isQuick = false; isProfile = false"

     class="border-b z-30 border-gray-100 sticky
      top-0 shadow bg-blue-900">

    <div class="flex items-center justify-between h-16 px-4 mx-auto screen-2xl sm:px-6 lg:px-8">

        <div class="flex items-center justify-between space-x-4">

            <div>

                    <span
                        class="text-2xl text-white italic font-extrabold tracking-widest uppercase rounded-lg">

                        {{ config('app.name') }}

                    </span>

            </div>

            <nav @click.prevent="isSlide = false"
                 class="items-end absolute  right-4 mr-6 justify-end pl-8 ml-8 text-sm font-medium space-x-2 md:flex">

                <div class="hidden space-x-2 lg:block">

                    <a @click.prevent="isQuick = !isQuick"
                        class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg

                     hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 shadow "

                       href="#">

                        <i class="far fa-box-full pr-1"></i>

                        QuickAlert

                    </a>

{{--                    <a @click.prevent="isPackage = !isPackage"--}}
{{--                        class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg--}}

{{--                     hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 shadow "--}}

{{--                       href="#">--}}

{{--                        <i class="far fa-hand-holding-box pr-1"></i>--}}

{{--                        My Packages--}}

{{--                    </a>--}}

                    <a  @click.prevent="isProfile = !isProfile"
                        class="px-4 py-2 mt-2 text-sm font-semibold bg-white rounded-lg

                    italic hover:bg-gray-300 shadow "

                       href="#">

                        <i class="far fa-cog"></i>

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

    <x-modal alpName="isQuick" class="bg-gray-900 overflow-y-scroll">

        <div>
            <div class="px-4 pt-4 pb-4 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h1
                        class="text-4xl font-extrabold text-transparent sm:text-7xl bg-clip-text bg-white">

                        Create Pre-Alert

                    </h1>

                </div>
            </div>
        </div>


        <div class="flex mt-12 p-4">

            <div class=" w-8/12 px-4">

               @livewire('member.create.pre-alert')

            </div>


            <div class="max-w-sm  overflow-hidden w-full bg-white  shadow-lg dark:bg-gray-800">

                <img class="object-cover object-center w-full h-56" src="https://cdn.pixabay.com/photo/2020/11/13/17/01/dhl-5739205_960_720.jpg" alt="avatar">

                <div class="flex items-center px-6 py-3 bg-blue-500">


                </div>

                <div class="px-6 py-4">
                    <h1 class="text-xl font-semibold text-gray-800 dark:text-white">{{ auth()->user()->username }}</h1>

                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z"/>
                        </svg>

                        <h1 class="px-2 text-sm">Address:

                            <div class="break-words text-md w-8/12">

                                {{ $personalInfo->address }}

                            </div>

                        </h1>
                    </div>

                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z"/>
                        </svg>

                        <h1 class="px-2 text-sm">Mailbox:

                            <div class="break-words text-md w-8/12">

                            {{ $personalInfo->mailaddress }}

                            </div>

                        </h1>

                    </div>

                </div>

            </div>



        </div>

    </x-modal>

    <x-modal alpName="isProfile" class=" p-5 flex bg-gray-900 overflow-auto">

       @livewire('member.update.profile')

    </x-modal>


</div>

