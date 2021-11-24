<div x-data="{ isMember: false }"
    class="h-auto">

    <div class="lg:flex my-28">

        <div class="flex h-full w-full px-6 py-8 inset-y-0 lg:w-full">

            <div class="w-10/12">

                <h2 class="text-4xl font-extrabold capitalize italic text-white lg:text-8xl">

                    Delivery to Your Door

                    24/7 Anywhere <i class="fas fa-globe-americas"></i>

                </h2>

                <p class="mt-4 text-sm text-white dark:text-gray-400 capitalize lg:text-base">

                    Making delivery to your door step on package at a time <br>
                    at any of our 5 locations worldwide

                    </p>

                <div class="flex flex-col mt-6 space-y-3 lg:space-y-0 lg:flex-row">

                    <a href="#" @click.prevent="isMember = !isMember"
                       class="relative inline-block px-12 py-3 mt-8 text-center overflow-hidden border-2 border-white hover:bg-white transition-colors group">
                        <span
                            class="absolute inset-0 transition transform origin-left bg-white transform scale-x-0 bg-blue-500 group-hover:scale-x-100"></span>

                        <span class="relative text-white group-hover:text-black text-sm font-medium tracking-widest uppercase">

                            Join Us As A Member

                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <x-modal alpName="isMember" class="flex bg-gray-900 bg-opacity-80">

        @livewire('auth.register')

    </x-modal>


</div>

